--  1. Retrieve the top 5 customers with the highest total spending
SELECT user_id, SUM(total_amount) AS total_spent
FROM orders
GROUP BY user_id
ORDER BY total_spent DESC
LIMIT 5;

--  2. Get the total revenue for the current month
SELECT SUM(total_amount) AS total_revenue
FROM orders
WHERE YEAR(created_at) = YEAR(CURRENT_DATE())
AND MONTH(created_at) = MONTH(CURRENT_DATE());

--  3. List the most sold products
SELECT product_id, SUM(quantity) AS total_sold
FROM order_items
GROUP BY product_id
ORDER BY total_sold DESC;
