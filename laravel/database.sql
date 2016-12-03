USE GOODfIRM;

CREATE OR REPLACE TABLE categories(
	id 				INT NOT NULL AUTO_INCREMENT,
	NOMBRE			VARCHAR(255) NOT NULL,
	DESCRIPCION		TEXT NOT NULL,
	PRIMARY KEY(id)
);

CREATE OR REPLACE TABLE articles(
	id						INT NOT NULL AUTO_INCREMENT,
	category_id				INT NOT NULL,
	titulo 					VARCHAR(255) NOT NULL,
	contenido				TEXT NOT NULL,
	autor 					VARCHAR(255) NOT NULL,
	fecha					DATE 	NOT NULL,
	ruta_imagen				VARCHAR(300),
	cantidad_visitas		INT NOT NULL,
	cantidad_me_gusta 		INT NOT NULL,
	cantidad_no_me_gusta	INT NOT NULL,
	ruta 					VARCHAR(300)
	PRIMARY KEY(id),
	FOREIGN KEY(category_id) REFERENCES categories(id)
);

CREATE OR REPLACE TABLE areas(
	id 				INT NOT NULL AUTO_INCREMENT,
	nombre	 		VARCHAR(255) NOT NULL,
	descripcion		TEXT NOT NULL,
	PRIMARY KEY(id)
);


CREATE OR REPLACE TABLE services(
	id				INT NOT NULL AUTO_INCREMENT,
	area_id 		INT NOT NULL,
	nombre			VARCHAR(255) NOT NULL,	
	descripcion		TEXT NOT NULL,
	ruta 			VARCHAR(300)
	PRIMARY KEY(id),
	FOREIGN KEY(areas) REFERENCES AREA(id)
);


CREATE OR REPLACE TABLE tasks(
	id			INT NOT NULL AUTO_INCREMENT,
	servicio_id 			INT NOT NULL,
	nombre		TEXT NOT NULL,	
	PRIMARY KEY(servicio_id),
	FOREIGN KEY(services) REFERENCES SERVICIO(id)
);
