#
# Table structure for table 'tx_poems_domain_model_poem'
#
CREATE TABLE tx_poems_domain_model_poem (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	authors int(11) DEFAULT '0' NOT NULL,
	categories int(11) DEFAULT '0' NOT NULL,
	languages int(11) DEFAULT '0' NOT NULL,
	text text NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_poems_domain_model_author'
#
CREATE TABLE tx_poems_domain_model_author (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_poems_domain_model_category'
#
CREATE TABLE tx_poems_domain_model_category (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_poems_domain_model_language'
#
CREATE TABLE tx_poems_domain_model_language (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_poems_poem_author_mm'
#
CREATE TABLE tx_poems_poem_author_mm (
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_foreign (uid_foreign),
    KEY uid_local (uid_local)
);

#
# Table structure for table 'tx_poems_poem_category_mm'
#
CREATE TABLE tx_poems_poem_category_mm (
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_foreign (uid_foreign),
    KEY uid_local (uid_local)
);

#
# Table structure for table 'tx_poems_poem_language_mm'
#
CREATE TABLE tx_poems_poem_language_mm (
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,

    KEY uid_foreign (uid_foreign),
    KEY uid_local (uid_local)
);
