DROP TABLE IF EXISTS activities;
CREATE TABLE activities (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(100),
	tipo VARCHAR(45),
	fecha_solicitud VARCHAR(45),
	fecha_actividad VARCHAR(45),
	descripcion VARCHAR(200),
	nombre_solicitante VARCHAR(45),
	apellido_solicitante VARCHAR(45),
	id_solicitante VARCHAR(45),
	email_solicitante VARCHAR(45),
	cel_solicitante VARCHAR(45),
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL	
	);

DROP TABLE IF EXISTS alerts;
CREATE TABLE alerts(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_usuario VARCHAR(45),
	marcador VARCHAR(45),
	fotos VARCHAR(45),
	created DATETIME,
	categoria VARCHAR(45)	
	);

DROP TABLE IF EXISTS environmentals;
CREATE TABLE environmentals (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	especies_sembradas VARCHAR(45),
	hectarea_reforestada VARCHAR(45),
	tiempo_ejecucion VARCHAR(45),
	descripcion VARCHAR(200),
	campaign_id INT
	);

DROP TABLE IF EXISTS helps;
CREATE TABLE helps (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	especies_sembradas VARCHAR(45),
	hectareas_reforestadas VARCHAR(45),
	tiempo_ejecucion VARCHAR(45),
	descripcion VARCHAR(200),
	campaign_id INT
	);

DROP TABLE IF EXISTS campaigns;
CREATE TABLE campaigns(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	tipo VARCHAR(45),
	fecha VARCHAR(45),
	lugar VARCHAR(45),
	municipio VARCHAR(45),
	valor VARCHAR(45),
	nro_beneficiarios VARCHAR(45),
	estado VARCHAR(45),
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL
	);

DROP TABLE IF EXISTS formations;
CREATE TABLE formations (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	tipo VARCHAR(45),
	lugar_pista VARCHAR(45),
	direccion VARCHAR(45),
	municipio VARCHAR(45),
	plan_id INT,
	type_id INT
	);

DROP TABLE IF EXISTS instructors;
CREATE TABLE instructors (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	categoria VARCHAR(45),
	descripcion VARCHAR(200),
	people_id INT
	);

DROP TABLE IF EXISTS features;
CREATE TABLE features (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	descripcion_general VARCHAR(200),
	fecha_ocurrencia VARCHAR(45),
	fenomenos VARCHAR(45),
	factores_favorecen VARCHAR(500),
	actores_involucrados VARCHAR(500),
	danos_presentados VARCHAR(500),
	crisis_social VARCHAR(500),
	desempeno_institucional VARCHAR(500),
	impacto_cultural VARCHAR(500),
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL
	);

DROP TABLE IF EXISTS emergencies;
CREATE TABLE emergencies(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(45),
	nombre VARCHAR(45),
	fecha VARCHAR(45),
	comunidad VARCHAR(45),
	barrio VARCHAR(45),
	municipio VARCHAR(45),
	direccion VARCHAR(90),
	tipo_inmueble VARCHAR(45),
	uso_inmueble VARCHAR(45),
	fotos VARCHAR(45)
	);

DROP TABLE IF EXISTS tools;
CREATE TABLE tools (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	tipo VARCHAR(45),
	descripcion VARCHAR(200),
	cantidad VARCHAR(45)	
	);

DROP TABLE IF EXISTS stages;
CREATE TABLE stages (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	municipio VARCHAR(45),
	departamento VARCHAR(45),
	marcador_zonal VARCHAR(45)
	);

DROP TABLE IF EXISTS families;
CREATE TABLE families(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	primer_apellido VARCHAR(45),
	segundo_apellido VARCHAR(45),
	sexo VARCHAR(45),
	parentesco VARCHAR(45),
	facha_nacimiento VARCHAR(45),
	sistema_salud VARCHAR(45),
	entidad_salud VARCHAR(45),
	comunidad VARCHAR(45),
	desplazado VARCHAR(45),
	fecha_desplazamiento VARCHAR(45),	
	programa_estatal VARCHAR(45),
	caracteristica_especial VARCHAR(45),
	telefono VARCHAR(45),
	estado_civil VARCHAR(45),
	beneficio_recibido VARCHAR(45),
	home_id INT
	);

DROP TABLE IF EXISTS homes;
CREATE TABLE homes(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	direccion VARCHAR(100),
	municipio VARCHAR(45),
	barrio VARCHAR(45),
	tipo_vivienda VARCHAR(45),
	tipo_ubicacion VARCHAR(45),
	descripcion VARCHAR(200),
	tipo_uso VARCHAR(45),
	tipo_pertenencia VARCHAR(45)
	);

DROP TABLE IF EXISTS causes;
CREATE TABLE causes (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	origen_asociado VARCHAR(45),
	descripcion VARCHAR(200),
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL	
	);

DROP TABLE IF EXISTS externals;
CREATE TABLE externals (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	empresa VARCHAR(45),
	cargo VARCHAR(45),
	antiguedad VARCHAR(45),
	created DATETIME DEFAULT NULL,
	people_id INT
	);

DROP TABLE IF EXISTS people;
CREATE TABLE people (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50),
	apellido_paterno VARCHAR(50),
	apellido_materno VARCHAR(50),
	sexo VARCHAR(50),
	f_nac VARCHAR(50),
	estado_civil VARCHAR(15),
	dir_laboral VARCHAR(90),
	tel_laboral VARCHAR(50),
	dir_domicilio VARCHAR(50),
	tel_domicilio VARCHAR(50),
	dir_personal VARCHAR(50),
	tel_personal VARCHAR(50),
	celular VARCHAR(50),
	email VARCHAR(50),
	ocupacion VARCHAR(50),
	nivel_escolar VARCHAR(50),
	contacto_emergencia VARCHAR(50),
	tel_emergencia VARCHAR(50),
	user_id INT
);

DROP TABLE IF EXISTS clues;
CREATE TABLE clues (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	municipio VARCHAR(45),
	direccion VARCHAR(100),
	tipo_pista VARCHAR(45)	
	);

DROP TABLE IF EXISTS plans;
CREATE TABLE plans(
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	nombre_periodo VARCHAR(45),
	seccional VARCHAR(45)	
	);

DROP TABLE IF EXISTS prevents;
CREATE TABLE prevents (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR(200),
	campaign_id INT
	);

DROP TABLE IF EXISTS programs;
CREATE TABLE programs(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	descripcion VARCHAR(45),
	prerequicitos VARCHAR(45) 
	);


DROP TABLE IF EXISTS recycles;
CREATE TABLE recycles (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	direccion VARCHAR(45),
	telefono VARCHAR(45),
	representante VARCHAR(45)
	);

DROP TABLE IF EXISTS garbages;
CREATE TABLE garbages (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	descripcion VARCHAR(45),
	tipo VARCHAR(45),
	kilo VARCHAR(45)	
	);

DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45)
	);

DROP TABLE IF EXISTS services;
CREATE TABLE services (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	descripcion VARCHAR(200),
	descripcion_equipos VARCHAR(200),
	activity_id INT
	);

DROP TABLE IF EXISTS themes;
CREATE TABLE themes (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	monbre VARCHAR (45),
	descripcion VARCHAR(200)
	);

DROP TABLE IF EXISTS types;
CREATE TABLE types (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	descripcion VARCHAR(200)
	);


DROP TABLE IF EXISTS users;
CREATE TABLE users (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	usuario VARCHAR(45),
	clave VARCHAR(45),
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL,
	rol_id INT,
	person_id INT
);

DROP TABLE IF EXISTS voluntaries;
CREATE TABLE voluntaries (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	rango VARCHAR(45),
	antiguedad VARCHAR(45),
	actividad_docente VARCHAR(45),
	tiempo_actividad VARCHAR(45),
	fotografia VARCHAR(45),
	person_id INT
	);

DROP TABLE IF EXISTS vulnerabilities;
CREATE TABLE vulnerabilities (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45),
	tipo VARCHAR(45),
	descripcion VARCHAR(200),
	home_id INT	
	);

DROP TABLE IF EXISTS alerts_emergencies;
CREATE TABLE alerts_emergencies (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	alert_id INT,
	emergency_id INT
	);

DROP TABLE IF EXISTS environmentals_garbages;
CREATE TABLE environmentals_garbages (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	environmetal_id INT,
	garbage_id INT
	);

DROP TABLE IF EXISTS emergencies_helps;
CREATE TABLE emergencies_helps (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	emergencies_id INT,
	helps_id INT
	);

DROP TABLE IF EXISTS campaigns_stages;
CREATE TABLE campaigns_stages (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	campaign_id INT,
	stage_id INT
	);


DROP TABLE IF EXISTS campaigns_voluntaries;
CREATE TABLE campaigns_voluntaries (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	campaign_id INT,
	voluntary_id INT
	);

DROP TABLE IF EXISTS formations_instructors;
CREATE TABLE formations_instructors (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	calificacion VARCHAR(45),
	observaciones VARCHAR(45),
	formation_id INT,
	instructor_id INT
	);

DROP TABLE IF EXISTS formations_tools;
CREATE TABLE formations_tools (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	formation_id INT,
	tool_id INT
	);

DROP TABLE IF EXISTS formations_clues;
CREATE TABLE formations_clues (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	formation_id INT,
	clue_id INT
	);

DROP TABLE IF EXISTS externals_formations;
CREATE TABLE externals_formations (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	external_id INT,
	formation_id INT
	);

DROP TABLE IF EXISTS formations_programs;
CREATE TABLE formations_programs (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	formation_id INT,
	program_id INT
	);

DROP TABLE IF EXISTS formations_voluntaries;
CREATE TABLE formations_voluntaries (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	formation_id INT,
	voluntary_id INT
	);

DROP TABLE IF EXISTS features_sources;
CREATE TABLE features_sources (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	feature_id INT,
	source_id INT,
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL
	);

DROP TABLE IF EXISTS emergencies_homes;
CREATE TABLE emergencies_homes (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	emergency_id INT,
	home_id INT,
	nombre_daño VARCHAR(90),
	descripcion VARCHAR(200),
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL
	);

DROP TABLE IF EXISTS sources_stages;
CREATE TABLE sources_stages (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	stage_id INT,
	source_id INT
	);


DROP TABLE IF EXISTS homes_prevents;
CREATE TABLE homes_prevents (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	home_id INT,
	prevent_id INT,
	created DATETIME DEFAULT NULL	
	);

DROP TABLE IF EXISTS programs_themes;
CREATE TABLE programs_themes (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	program_id INT,
	theme_id INT
	);

DROP TABLE IF EXISTS garbages_recycles;
CREATE TABLE garbages_recycles (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	garbage_id INT,
	recycle_id INT
	);

DROP TABLE IF EXISTS services_voluntaries;
CREATE TABLE services_voluntaries (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	created DATETIME DEFAULT NULL,
	service_id INT,
	voluntary_id INT
	);

