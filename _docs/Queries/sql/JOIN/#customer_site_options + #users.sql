SELECT s.id, 
       u.id as customer_id, u.username, u.email, 
       st.name_ru AS site_type, 
       engine_type_choice_id, engines_ids, xtra, 
       fn.files_names,
       finish_date
     FROM dnior_webapps_customer_site_options AS s
     JOIN dnior_users AS u ON u.id = customer_id
LEFT JOIN dnior_webapps_site_types as st ON st.id = s.site_type_id
LEFT JOIN dnior_webapps_files_names as fn ON SUBSTRING(fn.identifier,2) = s.id
WHERE customer_id <> 0 
ORDER BY customer_id, s.id DESC;