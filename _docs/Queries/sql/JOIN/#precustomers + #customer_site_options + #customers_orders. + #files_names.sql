      SELECT dnior_webapps_precustomers.id AS precustomer_id, 
             name,
             email, 
             dnior_webapps_customer_orders.id AS 'order id',
             dnior_webapps_customer_site_options.id AS 'collection id',
             files_names AS 'Files Names',
             dnior_webapps_files_names.id AS 'FILES NAMES record id',
             collections_ids AS 'SET: collections', 
             orders_ids AS 'SET: orders'
        FROM dnior_webapps_precustomers 
   LEFT JOIN dnior_webapps_customer_orders 
          ON dnior_webapps_precustomers.orders_ids 
      REGEXP concat('(^|,)',dnior_webapps_customer_orders.id,'(,|$)')
   LEFT JOIN dnior_webapps_customer_site_options 
          ON dnior_webapps_precustomers.collections_ids 
      REGEXP concat('(^|,)',dnior_webapps_customer_site_options.id,'(,|$)')
   LEFT JOIN dnior_webapps_files_names 
          ON ( concat('s',dnior_webapps_customer_site_options.id) = dnior_webapps_files_names.identifier
               OR
               concat('o',dnior_webapps_customer_orders.id) = dnior_webapps_files_names.identifier
             )
    ORDER BY email ASC;