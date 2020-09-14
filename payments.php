<?php
class ModelModulePayments extends Model
{
    public function createTables()
    {
        $this->db->query(
            'CREATE TABLE IF NOT EXISTS `' . DB_PREFIX . 'payment_list` (
                `payment_id` int(11) NOT NULL AUTO_INCREMENT,
                `uniq_code` varchar(255) NOT NULL,
                `pay_sistem` char(8) NOT NULL,
                `date_added` datetime NOT NULL,
                `amount` decimal(15,4) NOT NULL,
                `purpose` varchar(255) NOT NULL,
                `currency` char(3) NOT NULL,
                `bind` tinyint(1) DEFAULT 0 
                PRIMARY KEY (`payment_id`)
              ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0'
        );

        $this->db->query(
            'CREATE TABLE IF NOT EXISTS `' . DB_PREFIX . 'payment_to_order` (
                `payment_id` int(11) NOT NULL,
                `order_id` int(11) NOT NULL,
              ) ENGINE=MyISAM DEFAULT CHARSET=utf8'
        );
    }

    public function deleteTable()
    {
        $this->db->query('DROP TABLE `' . DB_PREFIX . 'payment_list`, `' . DB_PREFIX . 'payment_to_order`');
    }
}
