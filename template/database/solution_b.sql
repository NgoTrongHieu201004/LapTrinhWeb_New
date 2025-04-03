-- solution_b.sql

-- 1. Liệt kê các hóa đơn của khách hàng (mã user, tên user, mã hóa đơn)
SELECT users.user_id, users.user_name, orders.order_id 
FROM users 
JOIN orders ON users.user_id = orders.user_id;

-- 2. Liệt kê số lượng các hóa đơn của khách hàng (mã user, tên user, số đơn hàng)
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS total_orders
FROM users 
LEFT JOIN orders ON users.user_id = orders.user_id
GROUP BY users.user_id, users.user_name;

-- 3. Liệt kê thông tin hóa đơn (mã đơn hàng, số sản phẩm)
SELECT orders.order_id, COUNT(order_details.product_id) AS total_products
FROM orders 
JOIN order_details ON orders.order_id = order_details.order_id
GROUP BY orders.order_id;

-- 4. Liệt kê thông tin mua hàng của người dùng (mã user, tên user, mã đơn hàng, tên sản phẩm)
SELECT users.user_id, users.user_name, orders.order_id, products.product_name
FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
ORDER BY orders.order_id, users.user_id;

-- 5. Liệt kê 7 người dùng có số lượng đơn hàng nhiều nhất
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS total_orders
FROM users
JOIN orders ON users.user_id = orders.user_id
GROUP BY users.user_id, users.user_name
ORDER BY total_orders DESC
LIMIT 7;

-- 6. Liệt kê 7 người dùng mua sản phẩm có tên "Samsung" hoặc "Apple"
SELECT users.user_id, users.user_name, orders.order_id, products.product_name
FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
WHERE products.product_name LIKE '%Samsung%' OR products.product_name LIKE '%Apple%'
LIMIT 7;

-- 7. Liệt kê danh sách mua hàng của user gồm tổng tiền mỗi đơn hàng
SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price
FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
GROUP BY users.user_id, users.user_name, orders.order_id;

-- 8. Mỗi user chỉ chọn ra 1 đơn hàng có giá trị lớn nhất
SELECT users.user_id, users.user_name, orders.order_id, total_price FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price,
           RANK() OVER (PARTITION BY users.user_id ORDER BY SUM(products.product_price) DESC) AS rnk
    FROM users
    JOIN orders ON users.user_id = orders.user_id
    JOIN order_details ON orders.order_id = order_details.order_id
    JOIN products ON order_details.product_id = products.product_id
    GROUP BY users.user_id, users.user_name, orders.order_id
) ranked_orders WHERE rnk = 1;

-- 9. Mỗi user chỉ chọn ra 1 đơn hàng có giá trị nhỏ nhất
SELECT users.user_id, users.user_name, orders.order_id, total_price, total_products FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price, 
           COUNT(order_details.product_id) AS total_products,
           RANK() OVER (PARTITION BY users.user_id ORDER BY SUM(products.product_price) ASC) AS rnk
    FROM users
    JOIN orders ON users.user_id = orders.user_id
    JOIN order_details ON orders.order_id = order_details.order_id
    JOIN products ON order_details.product_id = products.product_id
    GROUP BY users.user_id, users.user_name, orders.order_id
) ranked_orders WHERE rnk = 1;

-- 10. Mỗi user chỉ chọn ra 1 đơn hàng có số sản phẩm nhiều nhất
SELECT users.user_id, users.user_name, orders.order_id, total_price, total_products FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price, 
           COUNT(order_details.product_id) AS total_products,
           RANK() OVER (PARTITION BY users.user_id ORDER BY COUNT(order_details.product_id) DESC) AS rnk
    FROM users
    JOIN orders ON users.user_id = orders.user_id
    JOIN order_details ON orders.order_id = order_details.order_id
    JOIN products ON order_details.product_id = products.product_id
    GROUP BY users.user_id, users.user_name, orders.order_id
) ranked_orders WHERE rnk = 1;