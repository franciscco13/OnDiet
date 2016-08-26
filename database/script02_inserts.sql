
-- Procedure Nutriologo
delimiter $$
create procedure nutriologo
(
	_name varchar(45),
	_apellidoPat varchar(45),
	_apellidoMat varchar(45),
	_email varchar(45),
	_pass varchar(45),
	_tel int
)
BEGIN
	insert into Nutriologo 
		(name, apellidoPat, apellidoMat, email, pass, tel)
		values (_name, _apellidoPat, _apellidoMat, _email, _pass, _tel);  
END $$
delimiter ;
 

-- Procedure alimento
delimiter $$
create procedure alimento(_name varchar(45))
BEGIN
	insert into Alimento (name) values (_name);  
END $$
delimiter ;
 

-- INSERTS
call nutriologo("Juan", "Martinez", "Martinez", "juanmar@gmail.com", "juancinbombin", 36369078);  
call nutriologo("Roberto", "Perez", "Gonzalez", "robert_pe@gmail.com", "roberpeadmin", 55630987);
call nutriologo("Miguel", "Lopez", "Aldana", "miguelo@gmail.com", "soyadminmiguel", 43231214);
call nutriologo("Raul", "Lopez", "Gomez", "raullo@gmail.com", "rauloadmin", 43235609);
call nutriologo("Rodolfo", "Cota", "Rodriguez", "rodolfo_cota@gmail.com", "soyeladminrodo", 21250987);
call nutriologo("Jair", "Pereira", "Gomez", "jairgo_pe@gmail.com", "jairpereiraadmin", 89760499);
call nutriologo("Carlos", "Salcedo", "Perez", "car_salce@gmail.com", "carlossacladmin", 55670908);
call nutriologo("Aris", "Hernandez", "Gomez", "arihernand@gmail.com", "ariherndadmin", 55223435);
call nutriologo("Miguel", "Ponce", "Ponce", "miguel_ponce@gmail.com", "miguelponcesoyadmin", 55343909);
call nutriologo("Carlos", "Villanueva", "Lopez", "charly_villanueva@gmail.com", "holasoyunadmincarlos", 55090807);
call nutriologo("Osvaldo", "Alanis", "Dominguez", "osvaalani@gmail.com", "nutriosvaldo", 55674980);
call nutriologo("Orbelin", "Pineda", "Martinez", "orbe_pineda@gmail.com", "oberpineda123", 55789302);
call nutriologo("Isaac", "Brizuela", "Trejo", "isac_bri@gmail.com", "brizuela12309", 56783435);
call nutriologo("Javier", "Lopez", "Mata", "javi_lopez@gmail.com", "javieredu", 55645434);
call nutriologo("Lucas", "Martinez", "Contreras", "luca_conter@gmail.com", "lucasnutrilogo", 54565253);
call nutriologo("Andre", "Gomez", "Rodriguez", "andre_gomez@gmail.com", "soyunnutrilogo", 55098765);
call nutriologo("Javier", "Mascherano", "Muñoz", "javi.muma@gmail.com", "nutrimasche", 55449897);
call nutriologo("Luis", "Suarez", "Mendez", "lucho_suarez@gmail.com", "luchosuarez", 54221198);
call nutriologo("Sergio", "Mendez", "Hernandez", "sergio_robert@gmail.com", "soynutrilogoroberto", 55454309);
call nutriologo("Jordi", "Alba", "Luna", "jordi_alba@gmail.com", "unnuevonutrijordi", 57898390);
call nutriologo("Antonio", "Perea", "Perea", "toni_pere@gmail.com", "antonioper", 54340907);
call nutriologo("Francisco", "Trejo", "Rodriguez", "franc.trejo@gmail.com", "elmejornutrilogo", 57980312);
call nutriologo("Andres", "Ireta", "Hernandez", "andrsin@gmail.com", "andreireta", 50090607);
call nutriologo("Gustavo", "Ayon", "Dominguez", "tavo_ayon@gmail.com", "tavoayon", 45321234);
call nutriologo("Patricia", "Rodriguez", "Ramirez", "patiro@gmail.com", "patricianutri", 78980678);
call nutriologo("Linda", "Fernandez", "Serrano", "lindafe@gmail.com", "lindanutriologa", 55989890);
call nutriologo("Barbara", "Lopez", "Blanco", "barba_lopez@gmail.com", "barbalo", 89764390);
call nutriologo("Elizabeth", "Martinez", "Suarez", "eli_marti@gmail.com", "elimar", 54673212);
call nutriologo("Jennifer", "Sanchez", "Molina", "jennisnache@gmail.com", "jeninutri", 53212321);
call nutriologo("Maria", "Perez", "Morales", "maria@gmail.com", "maria_perez", 50097865);
call nutriologo("Susan", "Gomez", "Ortega", "susan_gom@gmail.com", "susanutriloga", 57898792);
call nutriologo("Margaret", "Martin", "Delgado", "marga_mar@gmail.com", "margamartin", 52134245);
call nutriologo("Dorothy", "Jimenez", "Castro", "doro_castro@gmail.com", "dorotyjime", 50989023);
call nutriologo("Lisa", "Ruiz", "Ortiz", "lisa_jime", "lisaruiznutri", 76895321);
call nutriologo("Nancy", "Hernandez", "Rubio", "nancy_hernad@gmail.com", 'nancycy', 34109810);
call nutriologo("Karen", "Diaz", "Marin", "karen_diaz@gmail.com", "karenkaren", 50987654);
call nutriologo("Betty", "Moreno", "Sanz", "bet_moreno@gmail.com", "betmorenutri", 53210765);
call nutriologo("Helen", "Alvarez", "Nuñez", "helen_alva@gmail.com", "helennutriologa", 51120908);
call nutriologo("Sandra", "Muñoz", "Iglesias", "sandra_muño@gmail.com", "sandramuno", 23218976);
call nutriologo("Donna", "Romero", "Medina", "dona_romero@gmail.com", "donanutriologa", 53789675);
call nutriologo("Carol", "Alonso", "Garrido", "carol_alon@gmail.com", "nutricarol", 55490989);
call nutriologo("Ruth", "Gutierrez", "Santos", "ruth_guti@gmail.com", "ruthnutriologa", 54789098);
call nutriologo("Sharon", "Navarro", "Castillo", "sha_nava@gmail.com", "soyshanutrio", 55523456);
call nutriologo("Michelle", "Torres", "Cortes", "michel_torres@gmail.com", "michelnutriologatorres", 65789098);
call nutriologo("Laura", "Dominguez", "Lozano", "lau_dom@gmail.com", "nutriologalaura", 53232121);
call nutriologo("Sarah", "Vazquez", "Guerrero", "sa_vazquez@gmail.com", "savaznutri", 67453212);
call nutriologo("Kimberly", "Ramos", "Cano", "kim_ramos@gmail.com", "kinutriologo", 51123369);
call nutriologo("Deborah", "Gonzalez", "Prieto", "deb_nutriologa@gmail.com", "nutridebora", 90960304);
call nutriologo("Jessica", "Rodriguez", "Prieto", "jessi_ro@gmail.com", "rodrijessi", 54321213);
call nutriologo('Joan', 'Humphrey', 'Prince', 'Suspendisse@Duiselementumdui.com', '918', 0);
call nutriologo('Tarik', 'Melton', 'Dennis', 'aliquet.magna.a@ac.net', '846', 55);
call nutriologo('Kadeem', 'Park', 'Silva', 'Fusce.mollis.Duis@erosnon.org', '979', 0);
call nutriologo('Hilda', 'Miller', 'Walters', 'metus.sit.amet@cursuset.net', '778', 845);
call nutriologo('Tyler', 'Miller', 'Garcia', 'massa@vestibulumnequesed.net', '464', 7624);
call nutriologo('Xenos', 'Becker', 'Hurst', 'auctor.quis.tristique@placerataugue.co.uk', '406', 7624);
call nutriologo('Isaiah', 'Haley', 'Meyer', 'dis@necluctusfelis.edu', '714', 845);
call nutriologo('Cheryl', 'Wallace', 'Richmond', 'natoque@quismassa.edu', '599', 56);
call nutriologo('Garrison', 'England', 'Wilder', 'velit.justo@ligulatortordictum.com', '511', 0);
call nutriologo('Steel', 'Joyner', 'Porter', 'neque.Morbi@Vivamusnibhdolor.net', '629', 76);
call nutriologo('Clark', 'Avila', 'Anthony', 'id.libero@dolor.co.uk', '809', 0);
call nutriologo('Joshua', 'Church', 'Jacobson', 'magna.Phasellus.dolor@Inatpede.net', '529', 845);
call nutriologo('Palmer', 'Hernandez', 'Browning', 'inceptos@at.com', '497', 0);
call nutriologo('Kato', 'Adams', 'Wong', 'luctus.et.ultrices@commodoatlibero.edu', '47', 845);
call nutriologo('Ima', 'Avila', 'Joseph', 'Cras.eget.nisi@mi.ca', '872', 7624);
call nutriologo('Cheryl', 'Gross', 'Rice', 'malesuada@duiinsodales.co.uk', '217', 56);
call nutriologo('Dalton', 'Mann', 'Stanley', 'scelerisque.neque@Nunc.org', '984', 365);
call nutriologo('Simon', 'Huffman', 'Bray', 'penatibus@nulla.co.uk', '968', 70);
call nutriologo('Grant', 'Gonzalez', 'Boyle', 'libero.nec.ligula@ipsum.net', '175', 76);
call nutriologo('Jackson', 'Gardner', 'Rios', 'sem@Crasinterdum.ca', '58', 0);
call nutriologo('Duncan', 'Barton', 'Aguilar', 'Suspendisse@vitae.ca', '19', 800);
call nutriologo('Honorato', 'Moses', 'Beach', 'ut.lacus@antedictum.com', '639', 76);
call nutriologo('Bernard', 'Colon', 'Frederick', 'Vivamus.nibh@cursus.edu', '25', 55);
call nutriologo('Georgia', 'Strickland', 'Hopper', 'vestibulum.lorem@Cum.ca', '558', 500);
call nutriologo('Maite', 'Mann', 'Vargas', 'feugiat.placerat@neceuismodin.ca', '934', 7624);
call nutriologo('Janna', 'Jacobson', 'Gregory', 'auctor.quis.tristique@quisturpisvitae.org', '736', 56);
call nutriologo('Gareth', 'Livingston', 'Faulkner', 'inceptos.hymenaeos@euerosNam.org', '41', 0);
call nutriologo('Cole', 'Dickerson', 'Bowman', 'erat@aliquet.edu', '793', 913);
call nutriologo('Knox', 'Sherman', 'Lott', 'pulvinar.arcu@ultricies.net', '801', 70);
call nutriologo('Dora', 'Neal', 'Short', 'dapibus.gravida@loremac.org', '160', 845);
call nutriologo('Hanna', 'Roberson', 'Hart', 'Nam.nulla@nondapibus.org', '824', 0);
call nutriologo('Marah', 'Henson', 'Lawson', 'per.conubia@loremvehicula.edu', '708', 0);
call nutriologo('Nora', 'Perkins', 'Porter', 'pellentesque@convallis.edu', '701', 801);
call nutriologo('Carolyn', 'Bruce', 'Estrada', 'mauris.eu.elit@acmetusvitae.co.uk', '135', 331);
call nutriologo('Galvin', 'Schneider', 'Sexton', 'placerat@tempus.com', '19', 7624);
call nutriologo('Jorden', 'Leblanc', 'Burton', 'gravida.Aliquam@rutrerit.com', '862', 70);
call nutriologo('Rahim', 'Burch', 'Avila', 'mauris.Suspendisse@netusetmalesuada.com', '572', 845);
call nutriologo('Rhona', 'Blanchard', 'Love', 'sapien.molestie@malesuadaaugueut.org', '221', 0);
call nutriologo('Inez', 'Elliott', 'Espinoza', 'Nunc.ac@tempuseuligula.net', '904', 0);
call nutriologo('Emerald', 'Baxter', 'Stark', 'vulputate.mauris.sagittis@maurissit.com', '571', 0);
call nutriologo('Destiny', 'Schmidt', 'Rivera', 'non@inceptos.net', '439', 800);
call nutriologo('Reuben', 'Spencer', 'Ingram', 'cursus.diam@Phasellusin.org', '550', 7624);
call nutriologo('Jakeem', 'Mcgee', 'Charles', 'arcu.Vestibulum.ante@felisNullatempor.org', '811', 76);
call nutriologo('Rhea', 'Pitts', 'Owen', 'orci@Donecestmauris.co.uk', '754', 800);
call nutriologo('Hanae', 'Blair', 'Mcmillan', 'molestie.Sed.id@risus.com', '885', 800);
call nutriologo('Carter', 'Copeland', 'Solomon', 'faucibus.Morbi.vehicula@Pellen.com', '508', 845);
call nutriologo('Courtney', 'Kerr', 'Kirkland', 'auctor.nunc@gravida.ca', '447', 973);
call nutriologo('Pandora', 'Dennis', 'Osborne', 'Nullam.scelerisque@vitaeeratVivamus.net', '356', 0);
call nutriologo('Octavia', 'Hart', 'Santos', 'purus.sapien.gravida@velit.org', '259', 55);
call nutriologo('Kelsie', 'Kline', 'Gutierrez', 'ante.lectus.convallis@tacitisociosquad.net', '444', 70);
call nutriologo('Adara', 'Carlson', 'Henson', 'dictum.augue.malesuada@montes.com', '724', 0);
call nutriologo('Meredith', 'Mayer', 'Mcclure', 'ante.dictum.cursus@rhoncusNullamvelit.com', '198', 845);
call nutriologo('Brynn', 'Sampson', 'Mueller', 'ac@eratvitaerisus.edu', '636', 7040);
call nutriologo('Wynne', 'Griffin', 'Holder', 'auctor.quis.tristique@Phase.new', '355', 7746);
call nutriologo('Sylvester', 'Mccormick', 'Castaneda', 'ac@inlobortis.edu', '107', 0);
call nutriologo('Uta', 'Petty', 'Stafford', 'elit.pretium@sitamet.co.uk', '936', 500);
call nutriologo('Marah', 'Sweet', 'Miranda', 'Aliquam.tincidunt.nunc@atortor.com', '500', 70);
call nutriologo('Brent', 'Drake', 'Marshall', 'pharetra.Nam.ac@nibhQuisquenonummy.edu', '704', 76);
call nutriologo('Stewart', 'Soto', 'Jensen', 'purus@posuereenim.net', '680', 845);
call nutriologo('Jonah', 'Cochran', 'Mcgee', 'augue.Sed.molestie@In.ca', '817', 0);
call nutriologo('Unity', 'Brown', 'Moody', 'Nulla.facilisis@pharetrautpharetra.com', '215', 800);
call nutriologo('Castor', 'Weber', 'Craft', 'neque@rhoncusProinnisl.net', '955', 76);
call nutriologo('Veda', 'Harding', 'Little', 'Quisque@egetmagnaSuspendisse.net', '955', 800);
call nutriologo('Duncan', 'Harrell', 'Herman', 'nisl@sitamet.org', '335', 55);
call nutriologo('Rebecca', 'Knox', 'Mann', 'ante.iaculis@velpede.net', '820', 0);
call nutriologo('Darius', 'Stokes', 'Bennett', 'adipiscing.non@Crasinterdum.edu', '254', 0);
call nutriologo('Shoshana', 'Duran', 'Allison', 'Donec.nibh@Donecvitae.co.uk', '717', 55);
call nutriologo('Jayme', 'Wright', 'Graham', 'lacus@euismodenim.org', '445', 880);
call nutriologo('Yoshi', 'Mcguire', 'Goodman', 'auctor.velit.Aliquam@vul.edu', '638', 320);
call nutriologo('Jakeem', 'Patterson', 'Bullock', 'pharetra.ut@consectetuermauris.com', '724', 70);
call nutriologo('Ashely', 'Sykes', 'Watts', 'dignissim.pharetra.Nam@sitamet.ca', '604', 0);
call nutriologo('Cailin', 'Haley', 'Sparks', 'quam.elementum@aceleifend.com', '794', 0);
call nutriologo('Lacota', 'Fisher', 'Mullins', 'euismod.est@gravida.com', '484', 0);
call nutriologo('Ebony', 'Gates', 'Terrell', 'Phasellus.nulla.Integer@aliquet.edu', '561', 0);
call nutriologo('Henry', 'Dale', 'Tanner', 'diam.lorem@tortor.ca', '600', 7624);
call nutriologo('Galvin', 'Espinoza', 'Aguirre', 'Duis@hendrerit.edu', '455', 0);
call nutriologo('Aurora', 'Goff', 'Park', 'eu@Sednunc.net', '35', 0);
call nutriologo('Curran', 'Shepard', 'Farmer', 'quam.a@bibendumfermentum.edu', '202', 800);
call nutriologo('Aquila', 'Lee', 'George', 'amet.dapibus.id@adipiscing.ca', '697', 0);
call nutriologo('Flavia', 'Roy', 'Boyer', 'auctor.vitae.aliquet@scel.e', '619', 917);
call nutriologo('Aspen', 'Keith', 'Chaney', 'egestas@semperegestas.org', '783', 800);
call nutriologo('Gary', 'Camacho', 'Francis', 'vel@urnaUt.co.uk', '371', 56);
call nutriologo('Taylor', 'Rocha', 'Donaldson', 'arcu@DonecestNunc.co.uk', '95', 0);
call nutriologo('Abdul', 'Pacheco', 'Wynn', 'laoreet.ipsum.Curabitur@habitant.com', '524', 70);
call nutriologo('Kyle', 'Reid', 'Everett', 'tristique@magnis.net', '836', 76);
call nutriologo('Jonas', 'Jensen', 'Kelly', 'Donec@elitCurabitursed.edu', '864', 397);
call nutriologo('Kirby', 'Skinner', 'Kelly', 'facilisis.facilisis@tempus.org', '764', 0);
call nutriologo('Haviva', 'Schmidt', 'Calhoun', 'dolor.elit@nisiCum.org', '560', 897);
call nutriologo('Bruce', 'Graves', 'Rodriquez', 'Fusce.dolor@quamvelsapien.com', '838', 970);
call nutriologo('Zia', 'Anderson', 'Goodwin', 'felis.Nulla@Quisque.org', '457', 937);
call nutriologo('April', 'Sims', 'Rutledge', 'libero.est@orci.edu', '89', 800);
call nutriologo('Natalie', 'Dyer', 'Crawford', 'lobortis.ultrices@neceleifendnon.ca', '461', 0);
call nutriologo('Clark', 'Marquez', 'Terrell', 'Ut@egetodio.net', '845', 56);
call nutriologo('Addison', 'Boyd', 'Jimenez', 'in.consectetuer.ipsum@consequat.com', '128', 993);
call nutriologo('Chase', 'Drake', 'Blanchard', 'vulputate@quis.ca', '360', 943);
call nutriologo('Rosalyn', 'Patton', 'Montoya', 'vitae@vehiculaaliquetlibero.edu', '207', 840);
call nutriologo('Russell', 'Donovan', 'Steele', 'Vivamus@arcu.net', '53', 70);
call nutriologo('Carol', 'Mathis', 'Clements', 'lorem.tristique@orci.net', '718', 0);
call nutriologo('Kirk', 'Gates', 'Walton', 'ipsum@non.org', '549', 912);
call nutriologo('Noble', 'Meyers', 'Sexton', 'Nulla.eu.neque@sedconsequat.co.uk', '513', 878);
 

call alimento('Aceituna');
call alimento('Agua');
call alimento('Ajo');
call alimento('Alcaparra');
call alimento('Almeja');
call alimento('Amaranto');
call alimento('Apio');
call alimento('Aroz');
call alimento('Arroz');
call alimento('Atún');
call alimento('Avellana');
call alimento('Avena');
call alimento('Bacalao');
call alimento('Berenjena');
call alimento('Brócoli');
call alimento('Cacahuate');
call alimento('Café');
call alimento('Calabaza');
call alimento('Canela');
call alimento('Cebada');
call alimento('Cebolla');
call alimento('Champiñón');
call alimento('Chile');
call alimento('Chía');
call alimento('Chícharo');
call alimento('Cilantro');
call alimento('Coco');
call alimento('Col');
call alimento('Durazno');
call alimento('Ejote');
call alimento('Frambuesa');
call alimento('Fresa');
call alimento('Frijol');
call alimento('Granada');
call alimento('Guanabana');
call alimento('Guayaba');
call alimento('Haba');
call alimento('Huevo');
call alimento('Kiwi');
call alimento('Leche');
call alimento('Lechuga');
call alimento('Lenteja');
call alimento('Lima');
call alimento('Limón');
call alimento('Mandarina');
call alimento('Mango');
call alimento('Maíz');
call alimento('Miel');
call alimento('Mora');
call alimento('Naranja');
call alimento('Nuez');
call alimento('Pan');
call alimento('Pepino');
call alimento('Pere');
call alimento('Pimienta');
call alimento('Pimiento');
call alimento('Platano');
call alimento('Pollo');
call alimento('Quinoa');
call alimento('Rábano');
call alimento('Tamarindo');
call alimento('Tomate');
call alimento('Trigo');
call alimento('Uva');
call alimento('Zanahoria');
call alimento('Zarzamora');




