<?php
include('conexion.php');
session_start();

if (isset($_GET['itemsInCart'])) {
    // Decodificar los elementos del carrito desde la URL
    $itemsInCart = json_decode(urldecode($_GET['itemsInCart']), true);
    $username = $_SESSION['username'];

    // Consultar el ID del usuario
    $query = "SELECT user_id FROM usuario WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Obtener el ID del usuario
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];

        // Consultar el carrito del usuario
        $userCartQuery = "SELECT cart_id FROM carrito WHERE user_id = ?";
        $stmtCart = mysqli_prepare($conn, $userCartQuery);
        mysqli_stmt_bind_param($stmtCart, "i", $user_id);
        mysqli_stmt_execute($stmtCart);
        $resultCart = mysqli_stmt_get_result($stmtCart);

        if ($resultCart && mysqli_num_rows($resultCart) > 0) {
            // El usuario tiene un carrito existente
            $rowCart = mysqli_fetch_assoc($resultCart);
            $cart_id = $rowCart['cart_id'];

            foreach ($itemsInCart as $item) {
                $productName = $item['title'];
                $quantity = $item['quantity'];

                // Consultar el ID del producto basado en el nombre
                $selectProductQuery = "SELECT producto_id FROM producto WHERE nombre = ?";
                $stmtProduct = mysqli_prepare($conn, $selectProductQuery);
                mysqli_stmt_bind_param($stmtProduct, "s", $productName);
                mysqli_stmt_execute($stmtProduct);
                $resultProduct = mysqli_stmt_get_result($stmtProduct);
                if ($resultProduct && mysqli_num_rows($resultProduct) > 0) {
                    // El producto existe
                    $rowProduct = mysqli_fetch_assoc($resultProduct);
                    $productId = $rowProduct['producto_id'];
                    $selectIdDetailsQuery = "SELECT cart_item_id FROM carrito_detalles WHERE cart_id = ? AND product_id = ?";
                    $stmtIIdDetails = mysqli_prepare($conn, $selectIdDetailsQuery);
                    mysqli_stmt_bind_param($stmtIIdDetails, "ii", $cart_id, $productId);
                    mysqli_stmt_execute($stmtIIdDetails);
                    $resultIIdDetails = mysqli_stmt_get_result($stmtIIdDetails);
                    $rowDetails = mysqli_fetch_assoc($resultIIdDetails);

                    if ($rowDetails) {
                        // El item ya está en detalles del carrito, se actualiza la cantidad
                        $newCantidad = $quantity;
                        $updateDetailsQuery = "UPDATE carrito_detalles SET cantidad = ? WHERE cart_item_id = ?";
                        $stmDetailsUpdateQuery = mysqli_prepare($conn, $updateDetailsQuery);
                        if ($stmDetailsUpdateQuery) {
                            mysqli_stmt_bind_param($stmDetailsUpdateQuery, "ii", $newCantidad, $rowDetails['cart_item_id']);
                            mysqli_stmt_execute($stmDetailsUpdateQuery);
                        } else {
                            echo "Error al preparar la consulta de actualización.";
                        }
                    } else {
                        $insertDetailsQuery = "INSERT INTO carrito_detalles (cart_id, product_id, cantidad) VALUES (?, ?, ?)";
                        $stmtInsertDetails = mysqli_prepare($conn, $insertDetailsQuery);
                        mysqli_stmt_bind_param($stmtInsertDetails, "iii", $cart_id, $productId, $quantity);
                        mysqli_stmt_execute($stmtInsertDetails);
                    }
                }
            }
            header('Location: envio.html');
            exit();
        } else {
            // El usuario no tiene un carrito existente, crea uno nuevo
            $insertCartQuery = "INSERT INTO carrito (user_id) VALUES (?)";
            $stmtNewCart = mysqli_prepare($conn, $insertCartQuery);
            mysqli_stmt_bind_param($stmtNewCart, "i", $user_id);
            mysqli_stmt_execute($stmtNewCart);

            // Obtener el ID del nuevo carrito creado
            $newCartId = mysqli_insert_id($conn);

            // Insertar los productos en el nuevo carrito
            foreach ($itemsInCart as $item) {
                $productId = $item['id'];
                $quantity = $item['quantity'];

                $insertDetailsQuery = "INSERT INTO carrito_detalles (cart_id, product_id, cantidad) VALUES (?, ?, ?)";
                $stmtInsertDetails = mysqli_prepare($conn, $insertDetailsQuery);
                mysqli_stmt_bind_param($stmtInsertDetails, "iii", $newCartId, $productId, $quantity);
                mysqli_stmt_execute($stmtInsertDetails);
            }
            header('Location: envio.html');
            exit();
        }
    } else {
        header('Location: login.php');
            exit();
    }
}
