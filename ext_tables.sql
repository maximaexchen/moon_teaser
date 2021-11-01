CREATE TABLE pages (
		tx_moonteaser_title text,
		tx_moonteaser_sub_title text,
		tx_moonteaser_description text,
		tx_moonteaser_css_class text,
		tx_moonteaser_image int(11) unsigned DEFAULT '0',
		tx_moonteaser_icon text,
		tx_moonteaser_hidden tinyint(4) DEFAULT '0' NOT NULL,
		tx_moonteaser_content int(10) DEFAULT '0',
);

CREATE TABLE pages_language_overlay (
		tx_moonteaser_title text,
		tx_moonteaser_sub_title text,
		tx_moonteaser_description text,
		tx_moonteaser_css_class text,
		tx_moonteaser_image int(11) unsigned DEFAULT '0',
		tx_moonteaser_icon text,
		tx_moonteaser_hidden tinyint(4) DEFAULT '0' NOT NULL,
		tx_moonteaser_content int(10) DEFAULT '0',
);

CREATE TABLE tt_content (
	tx_moonteaser_template text NOT NULL,
);