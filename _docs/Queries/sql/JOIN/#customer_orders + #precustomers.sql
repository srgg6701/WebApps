SELECT dnior_webapps_customer_orders.id, 
       components_names,
       files_names,
		   description,
		   budget,
		   finish_date 
  FROM dnior_webapps_customer_orders
  JOIN dnior_webapps_precustomers
    ON orders_ids REGEXP CONCAT('(^|,)',dnior_webapps_customer_orders.id,'(,|$)')
  LEFT JOIN dnior_webapps_files_names 
  ON ( 
        dnior_webapps_files_names.identifier = CONCAT('o',dnior_webapps_customer_orders.id)  
        OR
        dnior_webapps_files_names.identifier = CONCAT('s',dnior_webapps_customer_orders.id)  
    )
 WHERE dnior_webapps_precustomers.email = 'froud@crime.ru' OR session_id = 'sdfojdslfjsdljflsdjfl'
 ORDER BY id DESC;