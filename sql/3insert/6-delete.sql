USE sql_store;

DELETE FROM order_items
WHERE order_id IN (10,11);

SELECT * FROM order_items;

SELECT * FROM customers
WHERE customer_id in (1,7,12);