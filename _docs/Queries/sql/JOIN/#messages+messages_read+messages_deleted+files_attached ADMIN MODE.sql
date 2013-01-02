SELECT DISTINCT dnior_webapps_messages.id, 
       user_id_from, user_id_to, 
       DATE_FORMAT(dnior_webapps_messages.date_time, '%e.%m.%Y %H:%i') AS 'datetime', 
       r1.date_time AS 'read_datetime',
       r2.date_time AS 'read_datetime_by_me',
       subject, message, files_names,obj_identifier,
       dnior_webapps_messages_deleted.user_id AS del_by_user 
  FROM dnior_webapps_messages 
  LEFT JOIN dnior_webapps_messages_read AS r1
    ON (r1.message_id = dnior_webapps_messages.id AND r1.user_id <> 42)
  LEFT JOIN dnior_webapps_messages_read AS r2 
    ON (r2.message_id = dnior_webapps_messages.id AND r2.user_id = 42)
  LEFT JOIN dnior_webapps_files_attaches 
    ON dnior_webapps_files_attaches.message_id = dnior_webapps_messages.id
   LEFT JOIN dnior_webapps_messages_deleted 
     ON dnior_webapps_messages_deleted.message_id = dnior_webapps_messages.id
 WHERE (1
       )
ORDER BY dnior_webapps_messages.id