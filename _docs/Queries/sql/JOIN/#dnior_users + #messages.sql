SELECT dnior_users.id AS user_id, `name` AS user_name, `username` AS user_login,
FROM dnior_users, dnior_webapps_messages
WHERE dnior_webapps_messages.user_id_from = dnior_users.id
AND dnior_webapps_messages.id = 7;