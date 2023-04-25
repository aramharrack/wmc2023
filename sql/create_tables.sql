CREATE TABLE clients (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(30) NOT NULL,
  emailaddress VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  classicalusertype VARCHAR(30) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE managers (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(30) NOT NULL,
  emailaddress VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  classicalusertype VARCHAR(30) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE admins (
id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(30) NOT NULL,
  emailaddress VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  classicalusertype VARCHAR(30) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE regions (
  regionid INT NOT NULL,
  regionname VARCHAR(255) NOT NULL,
  PRIMARY KEY (regionid)
);

CREATE TABLE countries (
  countrycode VARCHAR(3) NOT NULL,
  countryname VARCHAR(50) NOT NULL,
  regionid INT NOT NULL,
  PRIMARY KEY (countrycode),
  FOREIGN KEY (regionid) REFERENCES regions (regionid) ON DELETE CASCADE
);

CREATE TABLE assettypes (
  assetid VARCHAR(8) NOT NULL,
  assetshort VARCHAR(50) NOT NULL,
  assetdesc VARCHAR(100) NOT NULL,
  PRIMARY KEY (assetid)
);

CREATE TABLE industrysectors (
  parmcode INT NOT NULL AUTO_INCREMENT,
  shortdesc VARCHAR(50) NOT NULL,
  PRIMARY KEY (parmcode)
);

CREATE TABLE instruments (
  instrumentid INT NOT NULL AUTO_INCREMENT,
  shortname VARCHAR(50) NOT NULL,
  instrumentname VARCHAR(100) NOT NULL,
  assetid VARCHAR(8) NOT NULL,
  parmcode INT NOT NULL,
  countrycode VARCHAR(3) NOT NULL,
  ticker VARCHAR(50) NOT NULL,
  isin VARCHAR(100),
  issuer VARCHAR(100) NOT NULL,
  stockexchange VARCHAR(255) NOT NULL,
  currency VARCHAR(3) NOT NULL,
  denomination INT NOT NULL,
  closingprice FLOAT NOT NULL,
  priceclosingdate DATE NOT NULL,
  issuedate DATE,
  maturitydate DATE,
  coupon FLOAT,
  riskrating INT NOT NULL,
  PRIMARY KEY (instrumentid),
  FOREIGN KEY (assetid) REFERENCES assettypes (assetid) ON DELETE CASCADE,
  FOREIGN KEY (parmcode) REFERENCES industrysectors (parmcode) ON DELETE CASCADE,
  FOREIGN KEY (countrycode) REFERENCES countries (countrycode) ON DELETE CASCADE
);

CREATE TABLE opportunities (
  oppid INT NOT NULL AUTO_INCREMENT,
  instrumentid INT NOT NULL,
  availabledate DATE NOT NULL,
  closingdate DATE NOT NULL,
  oppdetails TEXT NOT NULL,
  staffid INT NOT NULL,
  PRIMARY KEY (oppid),
  FOREIGN KEY (instrumentid) REFERENCES instruments (instrumentid) ON DELETE CASCADE,
  FOREIGN KEY (staffid) REFERENCES admins (id) ON DELETE CASCADE
);

CREATE TABLE preferences (
  prefid INT NOT NULL AUTO_INCREMENT,
  datesubmitted DATE NOT NULL,
  prefdetails TEXT NOT NULL,
  clientid INT NOT NULL,
  countrycode VARCHAR(255) NOT NULL,
  assetid INT NOT NULL,
  parmcode INT NOT NULL,
  regionid INT NOT NULL,
  PRIMARY KEY (prefid),
  FOREIGN KEY (clientid) REFERENCES clients (id) ON DELETE CASCADE,
  FOREIGN KEY (countrycode) REFERENCES countries (countrycode) ON DELETE CASCADE,
  FOREIGN KEY (assetid) REFERENCES assettypes (assetid) ON DELETE CASCADE,
  FOREIGN KEY (parmcode) REFERENCES industrysectors (parmcode) ON DELETE CASCADE,
  FOREIGN KEY (regionid) REFERENCES regions (regionid) ON DELETE CASCADE
);

CREATE TABLE investmentideas (
  ideaid INT NOT NULL AUTO_INCREMENT,
ideatitle VARCHAR(255) NOT NULL,
ideadesc TEXT NOT NULL,
PRIMARY KEY (ideaid)
);

CREATE TABLE ideaproducts (
productsid INT NOT NULL AUTO_INCREMENT,
ideaid INT NOT NULL,
instrumentid INT NOT NULL,
PRIMARY KEY (productsid),
FOREIGN KEY (ideaid) REFERENCES investmentideas (ideaid) ON DELETE CASCADE,
FOREIGN KEY (instrumentid) REFERENCES instruments (instrumentid) ON DELETE CASCADE
);

CREATE TABLE preferenceopportunities (
  oppid INT NOT NULL,
  prefid INT NOT NULL,
  /*matchdate DATE NOT NULL,*/
  status VARCHAR(30),
  PRIMARY KEY (id),
  FOREIGN KEY (oppid) REFERENCES opportunities (oppid) ON DELETE CASCADE,
  FOREIGN KEY (prefid) REFERENCES preferences (prefid) ON DELETE CASCADE
);

ALTER TABLE `preferenceopportunities`
  ADD PRIMARY KEY (`prefid`,`oppid`),
  ADD KEY `oppid` (`oppid`);

CREATE TABLE IF currencies (
  ccycode varchar(3) NOT NULL,
  ccyname varchar(50) NOT NULL,
  PRIMARY KEY (ccycode)
);


CREATE TABLE risklevels (
  risklvlid INT NOT NULL AUTO_INCREMENT,
riskdesc VARCHAR(255) NOT NULL,
riskdefinition TEXT NOT NULL,
PRIMARY KEY (risklvlid)
);

