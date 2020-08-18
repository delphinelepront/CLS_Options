#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: LEVEL
#------------------------------------------------------------

CREATE TABLE LEVEL(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (10) NOT NULL
	,CONSTRAINT LEVEL_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE USER(
        id          Int  Auto_increment  NOT NULL ,
        first_name  Varchar (50) NOT NULL ,
        last_name   Varchar (50) NOT NULL ,
        mail        Varchar (50) NOT NULL ,
        pwd         Varchar (30) NOT NULL ,
        statut      Varchar (10) NOT NULL ,
        month_hours Float NOT NULL ,
        week_hours  Float NOT NULL ,
        id_LEVEL    Int NOT NULL
	,CONSTRAINT USER_PK PRIMARY KEY (id)
	,CONSTRAINT USER_LEVEL_FK FOREIGN KEY (id_LEVEL) REFERENCES LEVEL(id)
	,CONSTRAINT USER_LEVEL_AK UNIQUE (id_LEVEL)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GROUP_PROJECT
#------------------------------------------------------------

CREATE TABLE GROUP_PROJECT(
        id      Int  Auto_increment  NOT NULL ,
        name    Varchar (50) NOT NULL ,
        id_USER Int
	,CONSTRAINT GROUP_PROJECT_PK PRIMARY KEY (id)
	,CONSTRAINT GROUP_PROJECT_USER_FK FOREIGN KEY (id_USER) REFERENCES USER(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROJECT
#------------------------------------------------------------

CREATE TABLE PROJECT(
        id       Int  Auto_increment  NOT NULL ,
        name     Varchar (10) NOT NULL ,
        id_GROUP_PROJECT Int
	,CONSTRAINT PROJECT_PK PRIMARY KEY (id)

	,CONSTRAINT PROJECT_GROUP_PROJECT_FK FOREIGN KEY (id_GROUP_PROJECT) REFERENCES GROUP_PROJECT(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROJECT_WORK
#------------------------------------------------------------

CREATE TABLE PROJECT_WORK(
        id         Int  Auto_increment  NOT NULL ,
        date       Date NOT NULL ,
        start_time Time NOT NULL ,
        stop_time  Time NOT NULL ,
        id_USER    Int ,
        id_PROJECT Int
	,CONSTRAINT PROJECT_WORK_PK PRIMARY KEY (id)

	,CONSTRAINT PROJECT_WORK_USER_FK FOREIGN KEY (id_USER) REFERENCES USER(id)
	,CONSTRAINT PROJECT_WORK_PROJECT0_FK FOREIGN KEY (id_PROJECT) REFERENCES PROJECT(id)
)ENGINE=InnoDB;

