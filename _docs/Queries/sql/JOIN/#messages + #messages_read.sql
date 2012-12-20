SELECT dnior_webapps_messages.id,
       ( SELECT DATE_FORMAT(dnior_webapps_messages_read.date_time, '%e.%m.%Y %H:%i')
         FROM dnior_webapps_messages_read 
        WHERE message_id = dnior_webapps_messages.id
       ) AS 'read_datetime',
       user_id_from AS sender_id, 
       user_id_to AS receiver_id, 
       DATE_FORMAT(dnior_webapps_messages.date_time, '%e.%m.%Y %H:%i') AS 'datetime', 
       subject, 
       message, 
       obj_identifier 
  FROM dnior_webapps_messages 
  LEFT JOIN dnior_webapps_messages_read ON message_id = dnior_webapps_messages.id 
 WHERE  user_id_to = 44 
ORDER BY dnior_webapps_messages.id DESC LIMIT 20