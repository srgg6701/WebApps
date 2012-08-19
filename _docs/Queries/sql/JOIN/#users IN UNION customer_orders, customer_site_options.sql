SELECT id, username, name FROM dnior_users
    WHERE id IN (
        SELECT DISTINCT customer_id
        FROM dnior_webapps_customer_orders
        WHERE customer_id >0
            UNION
        SELECT DISTINCT customer_id
        FROM dnior_webapps_customer_site_options
        WHERE customer_id >0
)