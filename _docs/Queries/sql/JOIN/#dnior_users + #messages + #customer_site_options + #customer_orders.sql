-- make clear if a respondent is a customer and who he is - a sender or a receiver
SELECT DISTINCT u.id AS user_id, 
    IF (m.user_id_from, "sender", 
        IF (m.user_id_from,"receiver","unknown")
       ) AS respondent_status,
    m.user_id_from AS sender_id, m.user_id_to AS receiver_id,
    `name` AS 'user_name', `username` AS 'user_login' -- the string is not necessary
FROM dnior_users AS u 
LEFT JOIN dnior_webapps_messages AS m 
       ON ( m.user_id_from = u.id -- sender
            OR 
            m.user_id_to = u.id   -- receiver
          )
LEFT JOIN dnior_webapps_customer_site_options 
    as cso ON cso.customer_id =  u.id
LEFT JOIN dnior_webapps_customer_orders 
    as co ON co.customer_id =  u.id
WHERE m.id = 10 -- message id
  AND ( cso.customer_id = m.user_id_from -- collection customer_id
        OR 
        co.customer_id = m.user_id_from  -- order customer_id
      )