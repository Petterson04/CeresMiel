<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch ($action) {
            case 'add':
                // Incrementamos la cantidad del producto y modificamos su subtotal
                if (isset($_SESSION['carrito'][$id])) {
                    $_SESSION['carrito'][$id]['cantidad']++;
                    $_SESSION['carrito'][$id]['subtotal'] = $_SESSION['carrito'][$id]['Precio'] * $_SESSION['carrito'][$id]['cantidad'];
                }
                break;

            case 'remove':
                // Disminuimmos la cantidad en el carrito y en dado caso de que  la cantidad sea =0 se elimina por completo
                if (isset($_SESSION['carrito'][$id])) {
                    $_SESSION['carrito'][$id]['cantidad']--;
                    if ($_SESSION['carrito'][$id]['cantidad'] <= 0) {
                        unset($_SESSION['carrito'][$id]);
                    } else {
                        $_SESSION['carrito'][$id]['subtotal'] = $_SESSION['carrito'][$id]['Precio'] * $_SESSION['carrito'][$id]['cantidad'];
                    }
                }
                break;

            case 'delete':
                // Eliminar el producto del carrito
                if (isset($_SESSION['carrito'][$id])) {
                    unset($_SESSION['carrito'][$id]);
                }
                break;

            default:
                break;
        }
    }

    header("Location: productos.php"); 
    exit;
?>