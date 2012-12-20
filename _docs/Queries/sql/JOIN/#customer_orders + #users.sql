SELECT c.id, u.id as customer_id, u.username, u.email, components_names, description, budget, finish_date
FROM dnior_webapps_customer_orders AS c
JOIN dnior_users AS u ON u.id = customer_id
WHERE customer_id <> 0 
ORDER BY customer_id, c.id DESC;