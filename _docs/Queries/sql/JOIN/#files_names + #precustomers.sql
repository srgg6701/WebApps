SELECT dnior_webapps_files_names.id, files_names, email, identifier 
  FROM dnior_webapps_files_names, dnior_webapps_precustomers 
 WHERE ( 
  (
    (
     collections_ids like CONCAT('%,',SUBSTR(identifier,2))
  OR collections_ids like CONCAT(SUBSTR(identifier,2),',%')
  OR collections_ids like CONCAT('%,',SUBSTR(identifier,2),',%')
  OR collections_ids = SUBSTR(identifier,2)
  )
    AND identifier LIKE 's%'
) OR  
  (
    (
      orders_ids like CONCAT('%,',SUBSTR(identifier,2))
   OR orders_ids like CONCAT(SUBSTR(identifier,2),',%')
   OR orders_ids like CONCAT('%,',SUBSTR(identifier,2),',%')
   OR orders_ids = SUBSTR(identifier,2)
   )
    AND identifier LIKE 'o%'
  )
)
ORDER BY email,SUBSTR(identifier,2) DESC;