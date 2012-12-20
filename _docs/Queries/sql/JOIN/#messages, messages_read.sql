SELECT dnior_webapps_messages.id,
       DATE_FORMAT(dnior_webapps_messages_read.date_time, '%e.%c.%Y') AS 'read_datetime',
       user_id_from, 
       user_id_to, 
       DATE_FORMAT(dnior_webapps_messages.date_time, '%e.%c.%Y') AS 'datetime', 
       subject, 
       message, 
       obj_identifier 
  FROM dnior_webapps_messages 
  LEFT JOIN dnior_webapps_messages_read ON message_id = dnior_webapps_messages.id
  WHERE  user_id_to = 44 
ORDER BY id DESC LIMIT 20