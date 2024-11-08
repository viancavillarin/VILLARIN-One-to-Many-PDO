<?php
require_once '../core/models.php';  // If the 'core' folder is one directory level up

require_once 'core/dbConfig.php';

// Function to get all orders
function getAllOrders() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM orders");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Function to get an order by its ID
function getOrderById($order_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = :order_id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to delete an order
function deleteOrder($order_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = :order_id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
}

// Function to update an order
function updateOrder($order_id, $customer_id, $order_date, $total_amount) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE orders 
                           SET customer_id = :customer_id, order_date = :order_date, total_amount = :total_amount
                           WHERE order_id = :order_id");

    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':order_date', $order_date);
    $stmt->bindParam(':total_amount', $total_amount);
    $stmt->bindParam(':order_id', $order_id);

    $stmt->execute();
}

// Function to get all customers
function getAllCustomers() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM customers");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a customer by ID
function getCustomerById($customer_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_id = :customer_id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to delete a customer
function deleteCustomer($customer_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM customers WHERE customer_id = :customer_id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->execute();
}

// Function to update a customer
function updateCustomer($customer_id, $name, $email, $phone, $address) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE customers 
                           SET name = :name, email = :email, phone = :phone, address = :address
                           WHERE customer_id = :customer_id");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':customer_id', $customer_id);

    $stmt->execute();
}

// Function to get all payments
function getAllPayments() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM payments");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a payment by its ID
function getPaymentById($payment_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM payments WHERE payment_id = :payment_id");
    $stmt->bindParam(':payment_id', $payment_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to delete a payment
function deletePayment($payment_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM payments WHERE payment_id = :payment_id");
    $stmt->bindParam(':payment_id', $payment_id);
    $stmt->execute();
}

// Function to update a payment
function updatePayment($payment_id, $rental_id, $payment_date, $amount, $payment_method) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE payments 
                           SET rental_id = :rental_id, payment_date = :payment_date, 
                               amount = :amount, payment_method = :payment_method
                           WHERE payment_id = :payment_id");

    $stmt->bindParam(':rental_id', $rental_id);
    $stmt->bindParam(':payment_date', $payment_date);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':payment_method', $payment_method);
    $stmt->bindParam(':payment_id', $payment_id);

    $stmt->execute();
}

// Function to add an order
function addOrder($customer_id, $order_date, $total_amount) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO orders (customer_id, order_date, total_amount) 
                           VALUES (:customer_id, :order_date, :total_amount)");

    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':order_date', $order_date);
    $stmt->bindParam(':total_amount', $total_amount);

    $stmt->execute();
}

// Function to add a customer
function addCustomer($name, $email, $phone, $address) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO customers (name, email, phone, address) 
                           VALUES (:name, :email, :phone, :address)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);

    $stmt->execute();
}

// Function to add a payment
function addPayment($rental_id, $payment_date, $amount, $payment_method) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO payments (rental_id, payment_date, amount, payment_method) 
                           VALUES (:rental_id, :payment_date, :amount, :payment_method)");

    $stmt->bindParam(':rental_id', $rental_id);
    $stmt->bindParam(':payment_date', $payment_date);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':payment_method', $payment_method);

    $stmt->execute();
}

?>
