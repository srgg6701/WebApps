SELECT dnior_webapps_files_names.id, files_names, 
-- collections_ids, orders_ids,
email, name, identifier 
  FROM dnior_webapps_files_names, 
       dnior_webapps_precustomers 
 WHERE (
        ( collections_ids REGEXP CONCAT('(^|,)',SUBSTR(identifier,2),'(,|$)')
         AND identifier LIKE 's%'
        ) 
        OR
        ( orders_ids REGEXP CONCAT('(^|,)',SUBSTR(identifier,2),'(,|$)')
         AND identifier LIKE 'o%'
        ) 
       )
ORDER BY SUBSTR(identifier,2) DESC;