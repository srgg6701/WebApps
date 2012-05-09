 SELECT dnior_webapps_site_options.id AS option_id, 
IF(sites_types_ids_location,sites_types_ids_location,0) as `site types`,
(   select name_ru FROM dnior_webapps_site_options_group 
    where site_options_ids REGEXP concat('(^|,)',dnior_webapps_site_options.id,'(,|$)')
) as `name_ru`, 

dnior_webapps_site_options.name_ru AS `option` 
    FROM dnior_webapps_site_options 
    LEFT JOIN dnior_webapps_site_options_partial 
    ON dnior_webapps_site_options_partial.site_option_id = dnior_webapps_site_options.id
WHERE dnior_webapps_site_options.id <> 24
 ORDER BY `site types` DESC, `name_ru`, `option` ASC;