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
    course_start_date int(11)          DEFAULT '0'    NOT NULL,
    course_end_date   int(11)          DEFAULT '0'    NOT NULL,
    activity_category int(11)          DEFAULT '0'    NOT NULL,
    level_category    int(11)          DEFAULT '0'    NOT NULL,
    access_category   int(11)          DEFAULT '0'    NOT NULL,
    image             varchar(255)     DEFAULT ''     NOT NULL,
    files             int(11)          DEFAULT '0'    NOT NULL,
    location          int(11) unsigned DEFAULT '0'    NOT NULL,
    price             double(11, 2)    DEFAULT '0.00' NOT NULL,
    price_information text,
    slug              varchar(2048),
);

#
# Table structure for table 'tx_sfeventmgt_domain_model_location'
#
CREATE TABLE tx_sfeventmgt_domain_model_location
(
    abbreviation text,
    auto_geocode tinyint(4) unsigned DEFAULT '1' NOT NULL,
    image        int(11) unsigned    DEFAULT '0' NOT NULL
);
