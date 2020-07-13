#
# Table structure for table 'tx_coursescheduler_domain_model_course'
#
CREATE TABLE tx_coursescheduler_domain_model_course
(

    title             varchar(255)     DEFAULT ''     NOT NULL,
    teaser            text,
    description       text,
    notes             text,
    course_start_time int(11)          DEFAULT '0'    NOT NULL,
    course_end_time   int(11)          DEFAULT '0'    NOT NULL,
    course_start_date date             DEFAULT NULL,
    course_end_date   date             DEFAULT NULL,
    activity_category int(11)          DEFAULT '0'    NOT NULL,
    level_category    int(11)          DEFAULT '0'    NOT NULL,
    access_category   int(11)          DEFAULT '0'    NOT NULL,
    image             int(11) unsigned                NOT NULL default '0',
    files             varchar(255)     DEFAULT ''     NOT NULL,
    location          int(11) unsigned DEFAULT '0'    NOT NULL,
    tag               int(11) unsigned DEFAULT '0'    NOT NULL,
    price             double(11, 2)    DEFAULT '0.00' NOT NULL,
    price_information text
);

#
# Table structure for table 'tx_coursescheduler_domain_model_location'
#
CREATE TABLE tx_coursescheduler_domain_model_location
(

    title        text,
    abbreviation text,
    street_nr    text,
    zip          varchar(255)  DEFAULT ''     NOT NULL,
    city         varchar(255)  DEFAULT ''     NOT NULL,
    country      varchar(255)  DEFAULT ''     NOT NULL,
    description  text,
    link         varchar(255)  DEFAULT ''     NOT NULL,
    longitude    double(11, 2) DEFAULT '0.00' NOT NULL,
    latitude     double(11, 2) DEFAULT '0.00' NOT NULL,
    image        int(11) unsigned             NOT NULL default '0'

);

#
# Table structure for table 'tx_coursescheduler_domain_model_tag'
#
CREATE TABLE tx_coursescheduler_domain_model_tag
(

    title text,
    notes text

);

#
# Table structure for table 'tx_coursescheduler_course_location_mm'
#
CREATE TABLE tx_coursescheduler_course_location_mm
(
    uid_local       int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     int(11) unsigned DEFAULT '0' NOT NULL,
    sorting         int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_coursescheduler_course_tag_mm'
#
CREATE TABLE tx_coursescheduler_course_tag_mm
(
    uid_local       int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign     int(11) unsigned DEFAULT '0' NOT NULL,
    sorting         int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid_local, uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
