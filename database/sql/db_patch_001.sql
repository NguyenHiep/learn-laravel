-- Add column params table website_info
ALTER TABLE `website_info`
ADD `params` JSON DEFAULT NULL COMMENT 'Chứa các thông tin cấu hình website' AFTER `company_logo`;