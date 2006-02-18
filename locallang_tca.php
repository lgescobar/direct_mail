<?php
/**
 *
 * @package TYPO3
 * @subpackage tx_directmail
 * @version $Id$
 */

$LOCAL_LANG = Array (
	'default' => Array (
		'module_sys_dmail_group.category' => 'Subscribe to categories',
		'module_sys_dmail_group.htmlemail' => 'Recieve e-mails as HTML?',
		'sys_dmail_category' => 'Direct Mail Category',
		'sys_dmail_category.category' => 'Category:',
		'sys_dmail_category.old_cat_number' => 'Old category number:',
		'sys_dmail' => 'Direct mails',
		'sys_dmail.subject' => 'Subject:',
		'sys_dmail.page' => 'Mail page:',
		'sys_dmail.from_email' => 'Sender email:',
		'sys_dmail.from_name' => 'Sender name:',
		'sys_dmail.replyto_email' => 'Reply email:',
		'sys_dmail.replyto_name' => 'Reply name:',
		'sys_dmail.return_path' => 'Return Path:',
		'sys_dmail.organisation' => 'Organization:',
		'sys_dmail.transfer_encoding' => 'Content transfer encoding:',
		'sys_dmail.charset' => 'Message text character set:',
		'sys_dmail.priority' => 'Priority:',
		'sys_dmail.priority.I.0' => 'Low',
		'sys_dmail.priority.I.2' => 'High',
		'sys_dmail.sendOptions' => 'Include:',
		'sys_dmail.sendOptions.I.0' => 'Plain text',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parameters, HTML:',
		'sys_dmail.plainParams' => 'Parameters, Plain text:',
		'sys_dmail.issent' => 'Is sent:',
		'sys_dmail.use_domain' => 'Domain of internal links:',
		'sys_dmail.use_rdct' => 'Redirect links longer than 76 characters:',
		'sys_dmail.long_link_rdct_url' => 'Long links redirection url:',
		'sys_dmail.long_link_mode' => 'Redirect not only links longer than 76 characters but ALL links:',
		'sys_dmail.renderedsize' => 'Compiled size:',
		'sys_dmail.attachment' => 'Attachments:',
		'sys_dmail.type.I.0' => 'TYPO3 page',
		'sys_dmail.type.I.1' => 'External URL',
		'sys_dmail.plainParams.ALT.1' => 'URL for plaintext:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL for HTML-content:',
		'sys_dmail.authcode_fieldList' => 'Fields used in the computation of authentication codes:',
		'sys_dmail_group' => 'Direct mail group',
		'sys_dmail_group.type.I.0' => 'From pages',
		'sys_dmail_group.type.I.1' => 'Plain list',
		'sys_dmail_group.type.I.2' => 'Static group',
		'sys_dmail_group.type.I.3' => 'Special query',
		'sys_dmail_group.type.I.4' => 'Other Mail Groups',
		'sys_dmail_group.static_list' => 'Recipients:',
		'sys_dmail_group.mail_groups' => 'Other mailgroups:',
		'sys_dmail_group.whichtables' => 'Tables:',
		'sys_dmail_group.whichtables.I.0' => 'Address',
		'sys_dmail_group.whichtables.I.1' => 'Website user',
		'sys_dmail_group.whichtables.I.2' => 'User Defined Table',
		'sys_dmail_group.whichtables.I.3' => 'Website User Group',
		'sys_dmail_group.list' => 'Recipients:',
		'sys_dmail_group.csv.I.0' => 'Separate emails by space/comma/linebreak',
		'sys_dmail_group.csv.I.1' => 'CSV [name],[email]',
		'sys_dmail_group.select_categories' => 'Must Attend Categories:',
		'sys_dmail_group.select_categories.I.0' => 'Cat 0',
		'sys_dmail_group.select_categories.I.1' => 'Cat 1',
		'sys_dmail_group.select_categories.I.2' => 'Cat 2',
		'sys_dmail_group.select_categories.I.3' => 'Cat 3',
		'sys_dmail_group.select_categories.I.4' => 'Cat 4',
		'sys_dmail_group.select_categories.I.5' => 'Cat 5',
		'sys_dmail_group.select_categories.I.6' => 'Cat 6',
		'sys_dmail_group.select_categories.I.7' => 'Cat 7',
		'sys_dmail_group.select_categories.I.8' => 'Cat 8',
		'sys_dmail_group.select_categories.I.9' => 'Cat 9',
	),
	'dk' => Array (
		'sys_dmail' => 'Direct mail',
		'sys_dmail.subject' => 'Emne:',
		'sys_dmail.page' => 'Side med mail:',
		'sys_dmail.from_email' => 'Afsender email:',
		'sys_dmail.from_name' => 'Afsender navn:',
		'sys_dmail.replyto_email' => 'Svar email:',
		'sys_dmail.replyto_name' => 'Svar navn:',
		'sys_dmail.return_path' => 'Retur sti:',
		'sys_dmail.organisation' => 'Organisation:',
		'sys_dmail.priority' => 'Prioritet:',
		'sys_dmail.priority.I.0' => 'Lav',
		'sys_dmail.priority.I.2' => 'H�j',
		'sys_dmail.sendOptions' => 'Medtag:',
		'sys_dmail.sendOptions.I.0' => 'Ren tekst',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametre, HTML:',
		'sys_dmail.plainParams' => 'Parametre, Ren tekst:',
		'sys_dmail.issent' => 'Sendt:',
		'sys_dmail.renderedsize' => 'Kompileret st�rrelse:',
		'sys_dmail.attachment' => 'Vedh�ng:',
		'sys_dmail.type.I.0' => 'TYPO3 side',
		'sys_dmail.type.I.1' => 'Extern URL',
		'sys_dmail.plainParams.ALT.1' => 'URL til "Ren tekst"-indhold:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL til HTML-indhold:',
		'sys_dmail_group' => 'Direct mail gruppe',
		'sys_dmail_group.type.I.0' => 'Fra sider',
		'sys_dmail_group.type.I.1' => 'Liste',
		'sys_dmail_group.type.I.2' => 'Statisk gruppe',
		'sys_dmail_group.type.I.3' => 'Specielt opslag',
		'sys_dmail_group.type.I.4' => 'Andre mail grupper',
		'sys_dmail_group.static_list' => 'Modtagere:',
		'sys_dmail_group.mail_groups' => 'Andre mail grupper:',
		'sys_dmail_group.whichtables' => 'Tabeller:',
		'sys_dmail_group.whichtables.I.0' => 'Adresse',
		'sys_dmail_group.whichtables.I.1' => 'Website bruger',
		'sys_dmail_group.whichtables.I.2' => 'Brugerdefineret tabel',
		'sys_dmail_group.list' => 'Modtagere:',
		'sys_dmail_group.csv.I.0' => 'Adskil emailadresser med mellemrum/komma/linieskift',
		'sys_dmail_group.csv.I.1' => 'CSV [navn],[email adresse]',
		'sys_dmail_group.select_categories' => 'Skal tilh�re kategorier:',
		'sys_dmail_group.select_categories.I.0' => 'Kat 0',
		'sys_dmail_group.select_categories.I.1' => 'Kat 1',
		'sys_dmail_group.select_categories.I.2' => 'Kat 2',
		'sys_dmail_group.select_categories.I.3' => 'Kat 3',
		'sys_dmail_group.select_categories.I.4' => 'Kat 4',
		'sys_dmail_group.select_categories.I.5' => 'Kat 5',
		'sys_dmail_group.select_categories.I.6' => 'Kat 6',
		'sys_dmail_group.select_categories.I.7' => 'Kat 7',
		'sys_dmail_group.select_categories.I.8' => 'Kat 8',
		'sys_dmail_group.select_categories.I.9' => 'Kat 9',
	),
	'de' => Array (
		'module_sys_dmail_group.category' => 'Kategorien abonnieren',
		'module_sys_dmail_group.htmlemail' => 'Emails im HTML-Format empfangen?',
		'sys_dmail_category' => 'Direct Mail Kategorie',
		'sys_dmail_category.category' => 'Kategorie',
		'sys_dmail' => 'Direct Mails',
		'sys_dmail.subject' => 'Betreff:',
		'sys_dmail.page' => 'Seiten senden:',
		'sys_dmail.from_email' => 'Absender E-Mail:',
		'sys_dmail.from_name' => 'Absender Name:',
		'sys_dmail.replyto_email' => 'Antwort E-Mail:',
		'sys_dmail.replyto_name' => 'Antwort Name:',
		'sys_dmail.return_path' => 'Return Pfad:',
		'sys_dmail.organisation' => 'Organisation:',
		'sys_dmail.priority' => 'Priorit�t:',
		'sys_dmail.priority.I.0' => 'Niedrig',
		'sys_dmail.priority.I.2' => 'Hoch',
		'sys_dmail.sendOptions' => 'Einbinden:',
		'sys_dmail.sendOptions.I.0' => 'Normaler Text',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parameter, HTML:',
		'sys_dmail.plainParams' => 'Parameter, normaler Text:',
		'sys_dmail.issent' => 'Gesendet:',
		'sys_dmail.long_link_rdct_url' => 'Lange Link-RDCT-URL:',
		'sys_dmail.long_link_mode' => 'Nicht nur Links l�nger als 76 Zeichen, sondern ALLE Links:',
		'sys_dmail.renderedsize' => '�bertragungsgr�sse:',
		'sys_dmail.attachment' => 'Anh�nge:',
		'sys_dmail.type.I.0' => 'TYPO3 Seite',
		'sys_dmail.type.I.1' => 'Externe URL',
		'sys_dmail.plainParams.ALT.1' => 'URL f�r normalen Text:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL f�r HTML-Inhalt:',
		'sys_dmail_group' => 'Versandgruppe',
		'sys_dmail_group.type.I.0' => 'Von Seiten',
		'sys_dmail_group.type.I.1' => 'Normale Liste',
		'sys_dmail_group.type.I.2' => 'Statische Gruppe',
		'sys_dmail_group.type.I.3' => 'Spezielle Anfrage',
		'sys_dmail_group.type.I.4' => 'Andere Mailgruppe',
		'sys_dmail_group.static_list' => 'Empf�nger:',
		'sys_dmail_group.mail_groups' => 'Andere Versandgruppen:',
		'sys_dmail_group.whichtables' => 'Tabellen:',
		'sys_dmail_group.whichtables.I.0' => 'Adresse',
		'sys_dmail_group.whichtables.I.1' => 'Website Benutzer',
		'sys_dmail_group.whichtables.I.2' => 'Benutzerdefinierte Tabelle',
		'sys_dmail_group.list' => 'Empf�nger:',
		'sys_dmail_group.csv.I.0' => 'Trennung der Emails durch Leerzeichen/Kommata/Zeilenumbruch',
		'sys_dmail_group.csv.I.1' => 'CSV [name],[email]',
		'sys_dmail_group.select_categories' => 'Kategorien m�ssen �bereinstimmen:',
		'sys_dmail_group.select_categories.I.0' => 'Kat 0',
		'sys_dmail_group.select_categories.I.1' => 'Kat 1',
		'sys_dmail_group.select_categories.I.2' => 'Kat 2',
		'sys_dmail_group.select_categories.I.3' => 'Kat 3',
		'sys_dmail_group.select_categories.I.4' => 'Kat 4',
		'sys_dmail_group.select_categories.I.5' => 'Kat 5',
		'sys_dmail_group.select_categories.I.6' => 'Kat 6',
		'sys_dmail_group.select_categories.I.7' => 'Kat 7',
		'sys_dmail_group.select_categories.I.8' => 'Kat 8',
		'sys_dmail_group.select_categories.I.9' => 'Kat 9',
	),
	'no' => Array (
		'sys_dmail' => 'Direct mail',
		'sys_dmail.subject' => 'Emne:',
		'sys_dmail.page' => 'Side med e-post:',
		'sys_dmail.from_email' => 'Avsender e-post:',
		'sys_dmail.from_name' => 'Avsender navn:',
		'sys_dmail.replyto_email' => 'Svar e-post:',
		'sys_dmail.replyto_name' => 'Svar navn:',
		'sys_dmail.return_path' => 'Retur sti:',
		'sys_dmail.organisation' => 'Organisasjon:',
		'sys_dmail.priority' => 'Prioritet:',
		'sys_dmail.priority.I.0' => 'Lav',
		'sys_dmail.priority.I.2' => 'H�y',
		'sys_dmail.sendOptions' => 'Inkluder:',
		'sys_dmail.sendOptions.I.0' => 'Ren tekst',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametere, HTML:',
		'sys_dmail.plainParams' => 'Parametere, Ren tekst:',
		'sys_dmail.issent' => 'Sendt:',
		'sys_dmail.renderedsize' => 'Kompilert st�rrelse:',
		'sys_dmail.attachment' => 'Vedlegg:',
		'sys_dmail.type.I.0' => 'TYPO3 side',
		'sys_dmail.type.I.1' => 'Ekstern webadresse (URL)',
		'sys_dmail.plainParams.ALT.1' => 'URL til "Ren tekst"-innhold:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL til HTML-innhold:',
		'sys_dmail_group' => 'Direct mail gruppe',
		'sys_dmail_group.type.I.0' => 'Fra sider',
		'sys_dmail_group.type.I.1' => 'Liste',
		'sys_dmail_group.type.I.2' => 'Statisk gruppe',
		'sys_dmail_group.type.I.3' => 'Spesielt oppslag',
		'sys_dmail_group.type.I.4' => 'Andre e-post grupper',
		'sys_dmail_group.static_list' => 'Mottakere:',
		'sys_dmail_group.mail_groups' => 'Andre e-post grupper:',
		'sys_dmail_group.whichtables' => 'Tabeller:',
		'sys_dmail_group.whichtables.I.0' => 'Adresse',
		'sys_dmail_group.whichtables.I.1' => 'Webside bruker',
		'sys_dmail_group.whichtables.I.2' => 'Brukerdefinert tabell',
		'sys_dmail_group.list' => 'Mottakere:',
		'sys_dmail_group.csv.I.0' => 'Skill e-postadresser med mellomrom/komma/linjeskift',
		'sys_dmail_group.csv.I.1' => 'CSV [navn],[e-post adresse]',
		'sys_dmail_group.select_categories' => 'M� tilh�re kategorier:',
		'sys_dmail_group.select_categories.I.0' => 'Kat 0',
		'sys_dmail_group.select_categories.I.1' => 'Kat 1',
		'sys_dmail_group.select_categories.I.2' => 'Kat 2',
		'sys_dmail_group.select_categories.I.3' => 'Kat 3',
		'sys_dmail_group.select_categories.I.4' => 'Kat 4',
		'sys_dmail_group.select_categories.I.5' => 'Kat 5',
		'sys_dmail_group.select_categories.I.6' => 'Kat 6',
		'sys_dmail_group.select_categories.I.7' => 'Kat 7',
		'sys_dmail_group.select_categories.I.8' => 'Kat 8',
		'sys_dmail_group.select_categories.I.9' => 'Kat 9',
	),
	'it' => Array (
		'sys_dmail' => 'Direct Mail',
		'sys_dmail.subject' => 'Oggetto:',
		'sys_dmail.page' => 'Pagina Mail:',
		'sys_dmail.from_email' => 'E-mail mittente:',
		'sys_dmail.from_name' => 'Nome mittente:',
		'sys_dmail.replyto_email' => 'E-mail di risposta:',
		'sys_dmail.replyto_name' => 'Nome per la risposta:',
		'sys_dmail.return_path' => 'Percorso di ritorno:',
		'sys_dmail.organisation' => 'Organizzazione:',
		'sys_dmail.priority' => 'Priorita\':',
		'sys_dmail.priority.I.0' => 'Bassa',
		'sys_dmail.priority.I.2' => 'Alta',
		'sys_dmail.sendOptions' => 'Includi:',
		'sys_dmail.sendOptions.I.0' => 'Testo semplice',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametri HTML:',
		'sys_dmail.plainParams' => 'Parametri testo ASCI:',
		'sys_dmail.issent' => 'Inviato:',
		'sys_dmail.long_link_rdct_url' => 'Long link RDCT url:',
		'sys_dmail.long_link_mode' => 'Non solo link pi� lunghi di 76 caratteri, ma TUTTI i link:',
		'sys_dmail.renderedsize' => 'Dimensione:',
		'sys_dmail.attachment' => 'Allegati:',
		'sys_dmail.type.I.0' => 'TYPO3 page',
		'sys_dmail.type.I.1' => 'URL esterno',
		'sys_dmail.plainParams.ALT.1' => 'URL per testo semplice:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL per contenuto HTML:',
		'sys_dmail_group' => 'Gruppo Direct Mail',
		'sys_dmail_group.type.I.0' => 'Dalle pagine',
		'sys_dmail_group.type.I.1' => 'Elenco semplice',
		'sys_dmail_group.type.I.2' => 'Gruppo Statico',
		'sys_dmail_group.type.I.3' => 'Query speciale',
		'sys_dmail_group.type.I.4' => 'Altri gruppi di e-mail',
		'sys_dmail_group.static_list' => 'Destinatari:',
		'sys_dmail_group.mail_groups' => 'Altri gruppi di e-mail:',
		'sys_dmail_group.whichtables' => 'Tabelle:',
		'sys_dmail_group.whichtables.I.0' => 'Indirizzo',
		'sys_dmail_group.whichtables.I.1' => 'Utente Web',
		'sys_dmail_group.whichtables.I.2' => 'Tabelle definite dall\'utente',
		'sys_dmail_group.list' => 'Destinatari:',
		'sys_dmail_group.csv.I.0' => 'Separate le e-mail con spazio/virgola/linebreak',
		'sys_dmail_group.csv.I.1' => 'CVS [Nome],[email]',
		'sys_dmail_group.select_categories' => 'Deve aver sottoscritto le seguenti categorie:',
		'sys_dmail_group.select_categories.I.0' => 'Cat 0',
		'sys_dmail_group.select_categories.I.1' => 'Cat 1',
		'sys_dmail_group.select_categories.I.2' => 'Cat 2',
		'sys_dmail_group.select_categories.I.3' => 'Cat 3',
		'sys_dmail_group.select_categories.I.4' => 'Cat 4',
		'sys_dmail_group.select_categories.I.5' => 'Cat 5',
		'sys_dmail_group.select_categories.I.6' => 'Cat 6',
		'sys_dmail_group.select_categories.I.7' => 'Cat 7',
		'sys_dmail_group.select_categories.I.8' => 'Cat 8',
		'sys_dmail_group.select_categories.I.9' => 'Cat 9',
	),
	'fr' => Array (
		'module_sys_dmail_group.category' => 'S\'abonner aux rubriques:',
		'module_sys_dmail_group.htmlemail' => 'Recevoir les messages en format HTML',
		'sys_dmail_category' => 'Rubrique de contenu',
		'sys_dmail_category.category' => 'Rubrique:',
		'sys_dmail_category.old_cat_number' => 'Ancien num�ro de rubrique:',
		'sys_dmail' => 'Bulletin',
		'sys_dmail.subject' => 'Sujet:',
		'sys_dmail.page' => 'Page de bulletin:',
		'sys_dmail.from_email' => 'Adresse �lectronique de l\'auteur:',
		'sys_dmail.from_name' => 'Pr�nom et nom de l\'auteur:',
		'sys_dmail.replyto_email' => 'Adresse �lectronique de r�ponse:',
		'sys_dmail.replyto_name' => 'Pr�nom et nom de r�ponse:',
		'sys_dmail.return_path' => 'Chemin de retour:',
		'sys_dmail.organisation' => 'Organisation:',
		'sys_dmail.transfer_encoding' => 'Encodage du contenu du message:',
		'sys_dmail.charset' => 'Encodage des caract�res du texte du message:',
		'sys_dmail.priority' => 'Priorit�:',
		'sys_dmail.priority.I.0' => 'Basse',
		'sys_dmail.priority.I.2' => 'Haute',
		'sys_dmail.sendOptions' => 'Inclure:',
		'sys_dmail.sendOptions.I.0' => 'Texte simple',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Param�tre, HTML:',
		'sys_dmail.plainParams' => 'Param�tre, Texte simple:',
		'sys_dmail.issent' => 'Est envoy�:',
		'sys_dmail.use_domain' => 'Domaine des liens internes:',
		'sys_dmail.use_rdct' => 'Rediriger les liens de plus de 76 caract�res de longueur:',
		'sys_dmail.long_link_rdct_url' => 'Url de redirection des liens longs:',
		'sys_dmail.long_link_mode' => 'Rediriger non seulement les liens de plus de 76 caract�res, mais TOUS les liens:',
		'sys_dmail.renderedsize' => 'Taille:',
		'sys_dmail.attachment' => 'Documents joints:',
		'sys_dmail.type.I.0' => 'Page TYPO3',
		'sys_dmail.type.I.1' => 'URL externe',
		'sys_dmail.plainParams.ALT.1' => 'URL pour texte simple:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL pour HTML content:',
		'sys_dmail.authcode_fieldList' => 'Champs utilis�s dans le calcul des codes d\'authentification:',
		'sys_dmail_group' => 'Liste de distribution',
		'sys_dmail_group.type.I.0' => 'Depuis la page',
		'sys_dmail_group.type.I.1' => 'Liste simple',
		'sys_dmail_group.type.I.2' => 'Groupe statique',
		'sys_dmail_group.type.I.3' => 'Requ�te sp�ciale',
		'sys_dmail_group.type.I.4' => 'Autre liste de distribution',
		'sys_dmail_group.static_list' => 'Destinataires:',
		'sys_dmail_group.mail_groups' => 'Autres listes de distribution:',
		'sys_dmail_group.whichtables' => 'Tables:',
		'sys_dmail_group.whichtables.I.0' => 'Adresse',
		'sys_dmail_group.whichtables.I.1' => 'Utilisateur du site',
		'sys_dmail_group.whichtables.I.2' => 'Table d�finie sur mesure',
		'sys_dmail_group.whichtables.I.3' => 'Groupe d\'utilisateurs du site',
		'sys_dmail_group.list' => 'Destinataires:',
		'sys_dmail_group.csv.I.0' => 'S�parer les courrier par des espace/virgule/saut � la ligne',
		'sys_dmail_group.csv.I.1' => 'CSV [name],[email]',
		'sys_dmail_group.select_categories' => 'Doit �tre abonn� aux rubriques:',
	),
	'es' => Array (
		'sys_dmail' => 'Bolet�n',
		'sys_dmail.subject' => 'Asunto:',
		'sys_dmail.page' => 'P�gina de bolet�n:',
		'sys_dmail.from_email' => 'Direcc�on del remitente:',
		'sys_dmail.from_name' => 'Nombre del remitente:',
		'sys_dmail.replyto_email' => 'Direcc�on de respuesta:',
		'sys_dmail.replyto_name' => 'Nombre de respuesta:',
		'sys_dmail.return_path' => 'Ruta de retorno:',
		'sys_dmail.organisation' => 'Organizaci�n:',
		'sys_dmail.priority' => 'Prioridad:',
		'sys_dmail.priority.I.0' => 'Baja',
		'sys_dmail.priority.I.2' => 'Alta',
		'sys_dmail.sendOptions' => 'Incluir:',
		'sys_dmail.sendOptions.I.0' => 'Texto simple',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Par�metros, HTML:',
		'sys_dmail.plainParams' => 'Par�metros, texto simple:',
		'sys_dmail.issent' => 'Enviado:',
		'sys_dmail.long_link_rdct_url' => 'Url de v�nculo RDCT:',
		'sys_dmail.long_link_mode' => 'No solo v�nculos m�s extensos de 76 caracteres sino TODOS los v�nculos:',
		'sys_dmail.renderedsize' => 'Tama�o compilado:',
		'sys_dmail.attachment' => 'Archivos adjuntos:',
		'sys_dmail.type.I.0' => 'P�gina TYPO3',
		'sys_dmail.type.I.1' => 'URL Externo',
		'sys_dmail.plainParams.ALT.1' => 'URL para el texto simple:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL para contenido HTML:',
		'sys_dmail_group' => 'Lista de correo',
		'sys_dmail_group.type.I.0' => 'De las p�ginas',
		'sys_dmail_group.type.I.1' => 'Lista simple',
		'sys_dmail_group.type.I.2' => 'Grupo est�tico',
		'sys_dmail_group.type.I.3' => 'B�squeda especial',
		'sys_dmail_group.type.I.4' => 'Otra lista de correo',
		'sys_dmail_group.static_list' => 'Destinatarios:',
		'sys_dmail_group.mail_groups' => 'Otras listas de correo:',
		'sys_dmail_group.whichtables' => 'Tablas:',
		'sys_dmail_group.whichtables.I.0' => 'Direcci�n',
		'sys_dmail_group.whichtables.I.1' => 'Usuarios del Website',
		'sys_dmail_group.whichtables.I.2' => 'Tabla definida por el usuario',
		'sys_dmail_group.list' => 'Destinatarios:',
		'sys_dmail_group.csv.I.0' => 'Separar direcciones de correo mediante espacio/coma/fin de l�nea',
		'sys_dmail_group.csv.I.1' => 'CSV [nombre],[email]',
		'sys_dmail_group.select_categories' => 'Categor�as de atenci�n forzada:',
		'sys_dmail_group.select_categories.I.0' => 'Cat 0',
		'sys_dmail_group.select_categories.I.1' => 'Cat 1',
		'sys_dmail_group.select_categories.I.2' => 'Cat 2',
		'sys_dmail_group.select_categories.I.3' => 'Cat 3',
		'sys_dmail_group.select_categories.I.4' => 'Cat 4',
		'sys_dmail_group.select_categories.I.5' => 'Cat 5',
		'sys_dmail_group.select_categories.I.6' => 'Cat 6',
		'sys_dmail_group.select_categories.I.7' => 'Cat 7',
		'sys_dmail_group.select_categories.I.8' => 'Cat 8',
		'sys_dmail_group.select_categories.I.9' => 'Cat 9',
	),
	'nl' => Array (
		'sys_dmail' => 'Direct mails',
		'sys_dmail.subject' => 'Onderwerp:',
		'sys_dmail.page' => 'Email pagina:',
		'sys_dmail.from_email' => 'Emailadres van afzender:',
		'sys_dmail.from_name' => 'Naam van afzender:',
		'sys_dmail.replyto_email' => 'Antwoord email:',
		'sys_dmail.replyto_name' => 'Antwoord naam:',
		'sys_dmail.return_path' => 'Retour Pad:',
		'sys_dmail.organisation' => 'Organisatie:',
		'sys_dmail.priority' => 'Prioriteit:',
		'sys_dmail.priority.I.0' => 'Laag',
		'sys_dmail.priority.I.2' => 'Hoog',
		'sys_dmail.sendOptions' => 'Inclusief:',
		'sys_dmail.sendOptions.I.0' => 'Plain tekst',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parameters, HTML:',
		'sys_dmail.plainParams' => 'Parameters, Plain tekst:',
		'sys_dmail.issent' => 'Is verzonden:',
		'sys_dmail.long_link_rdct_url' => 'Lange link RDCT url:',
		'sys_dmail.long_link_mode' => 'Niet alleen links langer dan 76 karackters, maar ALLE links:',
		'sys_dmail.renderedsize' => 'Gecompileerde grootte:',
		'sys_dmail.attachment' => 'Bijlage:',
		'sys_dmail.type.I.0' => 'TYPO3 pagina',
		'sys_dmail.type.I.1' => 'Externe URL',
		'sys_dmail.plainParams.ALT.1' => 'URL voor platte tekst:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL voor HMTL-inhoud:',
		'sys_dmail_group' => 'Direct mail groep',
		'sys_dmail_group.type.I.0' => 'Van pagina\'s',
		'sys_dmail_group.type.I.1' => 'Standaard lijst',
		'sys_dmail_group.type.I.2' => 'Statische groep',
		'sys_dmail_group.type.I.3' => 'Speciale zoekopdracht',
		'sys_dmail_group.type.I.4' => 'Andere Mail Groepen',
		'sys_dmail_group.static_list' => 'Ontvangers:',
		'sys_dmail_group.mail_groups' => 'Andere Mail Groepen:',
		'sys_dmail_group.whichtables' => 'Tabellen:',
		'sys_dmail_group.whichtables.I.0' => 'Adres',
		'sys_dmail_group.whichtables.I.1' => 'Webpagina gebruiker',
		'sys_dmail_group.whichtables.I.2' => 'Gebruiker Gedefinieerde Tabel',
		'sys_dmail_group.list' => 'Ontvangers:',
		'sys_dmail_group.csv.I.0' => 'Scheid emailadressen door spatie/komma/harde return',
		'sys_dmail_group.csv.I.1' => 'CSV [naam],[emailadres]',
		'sys_dmail_group.select_categories' => 'Moet in de volgende categorien vallen:',
		'sys_dmail_group.select_categories.I.0' => 'Cat 0',
		'sys_dmail_group.select_categories.I.1' => 'Cat 1',
		'sys_dmail_group.select_categories.I.2' => 'Cat 2',
		'sys_dmail_group.select_categories.I.3' => 'Cat 3',
		'sys_dmail_group.select_categories.I.4' => 'Cat 4',
		'sys_dmail_group.select_categories.I.5' => 'Cat 5',
		'sys_dmail_group.select_categories.I.6' => 'Cat 6',
		'sys_dmail_group.select_categories.I.7' => 'Cat 7',
		'sys_dmail_group.select_categories.I.8' => 'Cat 8',
		'sys_dmail_group.select_categories.I.9' => 'Cat 9',
	),
	'cz' => Array (
		'sys_dmail' => 'Direct mail',
		'sys_dmail.subject' => 'P�edm�t:',
		'sys_dmail.page' => 'Strana s mailem:',
		'sys_dmail.from_email' => 'E-mail odes�latele:',
		'sys_dmail.from_name' => 'Odes�latel:',
		'sys_dmail.replyto_email' => 'Odpov�d�t na (e-mail):',
		'sys_dmail.replyto_name' => 'Odpov�d�t na (jm�no):',
		'sys_dmail.return_path' => 'Cesta pro odpov��:',
		'sys_dmail.organisation' => 'Organizace:',
		'sys_dmail.priority' => 'D�le�itost:',
		'sys_dmail.priority.I.0' => 'N�zk�',
		'sys_dmail.priority.I.2' => 'Vysok�',
		'sys_dmail.sendOptions' => 'Vlo�it:',
		'sys_dmail.sendOptions.I.0' => 'Prost� text',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametry, HTML:',
		'sys_dmail.plainParams' => 'Parametry, prost� text:',
		'sys_dmail.issent' => 'Odesl�no:',
		'sys_dmail.long_link_rdct_url' => 'Dlouh� odkaz RDCT url:',
		'sys_dmail.long_link_mode' => 'Ne jenom odkazy del�� ne� 76 znak�, ale V�ECHNY odkazy:',
		'sys_dmail.renderedsize' => 'Kompletn� velikost:',
		'sys_dmail.attachment' => 'P��lohy:',
		'sys_dmail.type.I.0' => 'Strana TYPO3',
		'sys_dmail.type.I.1' => 'Extern� URL',
		'sys_dmail.plainParams.ALT.1' => 'URL pro prost� text:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL pro HTML-obsah:',
		'sys_dmail_group' => 'Skupina Direct mail',
		'sys_dmail_group.type.I.0' => 'Od str�nky',
		'sys_dmail_group.type.I.1' => 'Prost� seznam',
		'sys_dmail_group.type.I.2' => 'Statick� skupina',
		'sys_dmail_group.type.I.3' => 'Speci�ln� dotaz',
		'sys_dmail_group.type.I.4' => 'Dal?� mailov� skupiny',
		'sys_dmail_group.static_list' => 'P��jemci:',
		'sys_dmail_group.mail_groups' => 'Dal?� mailov� skupiny:',
		'sys_dmail_group.whichtables' => 'Tabulky:',
		'sys_dmail_group.whichtables.I.0' => 'Adresa',
		'sys_dmail_group.whichtables.I.1' => 'U�ivatel website',
		'sys_dmail_group.whichtables.I.2' => 'U?ivatelem definovan� tabulka',
		'sys_dmail_group.list' => 'P��jemci:',
		'sys_dmail_group.csv.I.0' => 'Odd�lovat emaily mezerou/��rkou/zalomen�m ��dky',
		'sys_dmail_group.csv.I.1' => 'CSV [name],[email]',
		'sys_dmail_group.select_categories' => 'Nutn� kategorie:',
		'sys_dmail_group.select_categories.I.0' => 'Cat 0',
		'sys_dmail_group.select_categories.I.1' => 'Cat 1',
		'sys_dmail_group.select_categories.I.2' => 'Cat 2',
		'sys_dmail_group.select_categories.I.3' => 'Cat 3',
		'sys_dmail_group.select_categories.I.4' => 'Cat 4',
		'sys_dmail_group.select_categories.I.5' => 'Cat 5',
		'sys_dmail_group.select_categories.I.6' => 'Cat 6',
		'sys_dmail_group.select_categories.I.7' => 'Cat 7',
		'sys_dmail_group.select_categories.I.8' => 'Cat 8',
		'sys_dmail_group.select_categories.I.9' => 'Cat 9',
	),
	'pl' => Array (
		'sys_dmail' => 'Maile bezpo�rednie',
		'sys_dmail.subject' => 'Temat:',
		'sys_dmail.page' => 'Mailowana strona:',
		'sys_dmail.from_email' => 'Email nadawcy:',
		'sys_dmail.from_name' => 'Nadawca:',
		'sys_dmail.replyto_email' => 'Adres zwrotny:',
		'sys_dmail.replyto_name' => 'Nazwa zwrotna:',
		'sys_dmail.return_path' => '�cie�ka zwrotna:',
		'sys_dmail.organisation' => 'Firma:',
		'sys_dmail.priority' => 'Priorytet:',
		'sys_dmail.priority.I.0' => 'Niski:',
		'sys_dmail.priority.I.2' => 'Wysoki:',
		'sys_dmail.sendOptions' => 'W��cz:',
		'sys_dmail.sendOptions.I.0' => 'Zwyk�y tekst',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametry, HTML:',
		'sys_dmail.plainParams' => 'Parametry, zwyk�y tekst:',
		'sys_dmail.issent' => 'Wys�ano:',
		'sys_dmail.renderedsize' => 'Wielko��:',
		'sys_dmail.attachment' => 'Za��czniki:',
		'sys_dmail.type.I.0' => 'Strona TYPO3',
		'sys_dmail.type.I.1' => 'Zewn�trzny URL',
		'sys_dmail.plainParams.ALT.1' => 'URL zwyk�ego tekstu:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL zawarto�ci HTML:',
		'sys_dmail_group' => 'Grupa mailowa',
		'sys_dmail_group.type.I.0' => 'Ze stron',
		'sys_dmail_group.type.I.1' => 'Lista',
		'sys_dmail_group.type.I.2' => 'Grupa statyczna',
		'sys_dmail_group.type.I.3' => 'Kwerenda',
		'sys_dmail_group.type.I.4' => 'Inne grupy mailowe',
		'sys_dmail_group.static_list' => 'Odbiorcy:',
		'sys_dmail_group.mail_groups' => 'Inne grupy mailowe:',
		'sys_dmail_group.whichtables' => 'Tabele:',
		'sys_dmail_group.whichtables.I.0' => 'Adres',
		'sys_dmail_group.whichtables.I.1' => 'U�ytkownik zewn�trzny',
		'sys_dmail_group.whichtables.I.2' => 'Tabela zdefiniowana',
		'sys_dmail_group.list' => 'Odbiorcy:',
		'sys_dmail_group.csv.I.0' => 'Oddziel emaile spacj�/przecinkiem/enterem',
		'sys_dmail_group.csv.I.1' => 'CSV [nazwa],[email]',
		'sys_dmail_group.select_categories' => 'Nale�y do kategorii:',
		'sys_dmail_group.select_categories.I.0' => 'Kategoria 0',
		'sys_dmail_group.select_categories.I.1' => 'Kategoria 1',
		'sys_dmail_group.select_categories.I.2' => 'Kategoria 2',
		'sys_dmail_group.select_categories.I.3' => 'Kategoria 3',
		'sys_dmail_group.select_categories.I.4' => 'Kategoria 4',
		'sys_dmail_group.select_categories.I.5' => 'Kategoria 5',
		'sys_dmail_group.select_categories.I.6' => 'Kategoria 6',
		'sys_dmail_group.select_categories.I.7' => 'Kategoria 7',
		'sys_dmail_group.select_categories.I.8' => 'Kategoria 8',
		'sys_dmail_group.select_categories.I.9' => 'Kategoria 9',
	),
	'si' => Array (
		'sys_dmail' => 'DirectMail sporo�ila',
		'sys_dmail.subject' => 'Predmet:',
		'sys_dmail.page' => 'Po�lji stran:',
		'sys_dmail.from_email' => 'Email po�iljatelja:',
		'sys_dmail.from_name' => 'Ime po�iljatelja:',
		'sys_dmail.replyto_email' => 'Email za odgovore:',
		'sys_dmail.replyto_name' => 'Ime za odgovore:',
		'sys_dmail.return_path' => 'Povratna pot:',
		'sys_dmail.organisation' => 'Organizacija:',
		'sys_dmail.priority' => 'Prioriteta:',
		'sys_dmail.priority.I.0' => 'Nizka',
		'sys_dmail.priority.I.2' => 'Visoka',
		'sys_dmail.sendOptions' => 'Vklju�i:',
		'sys_dmail.sendOptions.I.0' => 'Samo besedilo',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametri, samo besedilo',
		'sys_dmail.plainParams' => 'Parametri, HTML',
		'sys_dmail.issent' => 'Je poslano:',
		'sys_dmail.renderedsize' => 'Dejanska velikost:',
		'sys_dmail.attachment' => 'Priponke:',
		'sys_dmail.type.I.0' => 'TYPO3 stran',
		'sys_dmail.type.I.1' => 'Eksterni URL',
		'sys_dmail.plainParams.ALT.1' => 'URL vklju�enega besedila:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL vklju�ene HTML vsebine:',
		'sys_dmail_group' => 'DirectMail skupina',
		'sys_dmail_group.type.I.0' => 'Iz strani',
		'sys_dmail_group.type.I.1' => 'Obi�ajen seznam',
		'sys_dmail_group.type.I.2' => 'Stati�na skupina',
		'sys_dmail_group.type.I.3' => 'Posebna poizvedba',
		'sys_dmail_group.type.I.4' => 'Druga po�tna skupina',
		'sys_dmail_group.static_list' => 'Prejemniki:',
		'sys_dmail_group.mail_groups' => 'Druge po�tne skupine:',
		'sys_dmail_group.whichtables' => 'Tabele:',
		'sys_dmail_group.whichtables.I.0' => 'Naslov',
		'sys_dmail_group.whichtables.I.1' => 'Web uporabnik',
		'sys_dmail_group.whichtables.I.2' => 'Uporabni�ko dolo�ena tabela',
		'sys_dmail_group.list' => 'Prejemniki:',
		'sys_dmail_group.csv.I.0' => 'Lo�i sporo�ila z presledkom/piko/novo vrsto',
		'sys_dmail_group.csv.I.1' => 'CSV [ime],[email]',
		'sys_dmail_group.select_categories' => 'Obvezno vklju�ene kategorije:',
		'sys_dmail_group.select_categories.I.0' => 'Kat. 0',
		'sys_dmail_group.select_categories.I.1' => 'Kat. 1',
		'sys_dmail_group.select_categories.I.2' => 'Kat. 2',
		'sys_dmail_group.select_categories.I.3' => 'Kat. 3',
		'sys_dmail_group.select_categories.I.4' => 'Kat. 4',
		'sys_dmail_group.select_categories.I.5' => 'Kat. 5',
		'sys_dmail_group.select_categories.I.6' => 'Kat. 6',
		'sys_dmail_group.select_categories.I.7' => 'Kat. 7',
		'sys_dmail_group.select_categories.I.8' => 'Kat. 8',
		'sys_dmail_group.select_categories.I.9' => 'Kat. 9',
	),
	'fi' => Array (
		'sys_dmail' => 'Suora s�hk�posti',
		'sys_dmail.subject' => 'Asia:',
		'sys_dmail.page' => 'S�hk�posti sivu:',
		'sys_dmail.from_email' => 'L�hett�j�n s�hk�postiosoite:',
		'sys_dmail.from_name' => 'L�hett�j�n nimi;',
		'sys_dmail.replyto_email' => 'Palautus s�hk�postiosoite:',
		'sys_dmail.replyto_name' => 'Palautusnimi:',
		'sys_dmail.return_path' => 'Palautusosoite:',
		'sys_dmail.organisation' => 'Organisaatio',
		'sys_dmail.priority' => 'Prioriteetti:',
		'sys_dmail.priority.I.0' => 'alhainen',
		'sys_dmail.priority.I.2' => 'korkea',
		'sys_dmail.sendOptions' => 'Sis�lt�en:',
		'sys_dmail.sendOptions.I.0' => 'Pelkk� teksti',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Muuttujat, HTML:',
		'sys_dmail.plainParams' => 'Muuttujat, pelkk� teksti:',
		'sys_dmail.issent' => 'L�hetetty:',
		'sys_dmail.long_link_rdct_url' => 'Pitk� linkki RDCT url:',
		'sys_dmail.long_link_mode' => 'Kaikki linkit, my�s alle 76 merkkiset:',
		'sys_dmail.renderedsize' => 'K�sitelty koko:',
		'sys_dmail.attachment' => 'Liitetiedostot:',
		'sys_dmail.type.I.0' => 'Typo 3 sivu',
		'sys_dmail.type.I.1' => 'Ulkoinen URL',
		'sys_dmail.plainParams.ALT.1' => 'URL pelkistetylle tekstille:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL HTML-sis�ll�lle:',
		'sys_dmail_group' => 'Suora postituksen ryhm�',
		'sys_dmail_group.type.I.0' => 'Sivuilta',
		'sys_dmail_group.type.I.1' => 'Pelkistetty lista',
		'sys_dmail_group.type.I.2' => 'Pysyv� ryhm�',
		'sys_dmail_group.type.I.3' => 'Erikoiskysely',
		'sys_dmail_group.type.I.4' => 'Muut s�hk�posti ryhm�t',
		'sys_dmail_group.static_list' => 'Vastaanottajat:',
		'sys_dmail_group.mail_groups' => 'Muut s�hk�postiryhm�t:',
		'sys_dmail_group.whichtables' => 'Taulut:',
		'sys_dmail_group.whichtables.I.0' => 'Osoite',
		'sys_dmail_group.whichtables.I.1' => 'WWW-sivujen k�ytt�j�',
		'sys_dmail_group.whichtables.I.2' => 'K�ytt�j�n m��rittelem� taulu',
		'sys_dmail_group.list' => 'Vastaanottajat:',
		'sys_dmail_group.csv.I.0' => 'Erottele emailit tyhj�ll�/pilkulla/rivinvaihdolla',
		'sys_dmail_group.csv.I.1' => 'CSV[Nimi],[S�hk�postiosoite]',
		'sys_dmail_group.select_categories' => 'Luokkaan liitt�minen pakollinen',
		'sys_dmail_group.select_categories.I.0' => 'Luokka 0',
		'sys_dmail_group.select_categories.I.1' => 'Luokka 1',
		'sys_dmail_group.select_categories.I.2' => 'Luokka 2',
		'sys_dmail_group.select_categories.I.3' => 'Luokka 3',
		'sys_dmail_group.select_categories.I.4' => 'Luokka 4',
		'sys_dmail_group.select_categories.I.5' => 'Luokka 5',
		'sys_dmail_group.select_categories.I.6' => 'Luokka 6',
		'sys_dmail_group.select_categories.I.7' => 'Luokka 7',
		'sys_dmail_group.select_categories.I.8' => 'Luokka 8',
		'sys_dmail_group.select_categories.I.9' => 'Luokka 9',
	),
	'tr' => Array (
		'sys_dmail' => 'Do�rudan mailler',
		'sys_dmail.subject' => 'Konu:',
		'sys_dmail.page' => 'Mail sayfas�:',
		'sys_dmail.from_email' => 'G�nderenin e-maili:',
		'sys_dmail.from_name' => 'G�nderenin ad�:',
		'sys_dmail.replyto_email' => 'Cevap e-maili:',
		'sys_dmail.replyto_name' => 'Cevap ad�:',
		'sys_dmail.return_path' => 'Geri d�n�� yolu:',
		'sys_dmail.organisation' => 'Organizasyon:',
		'sys_dmail.priority' => '�ncelikli:',
		'sys_dmail.priority.I.0' => 'D���k:',
		'sys_dmail.priority.I.2' => 'Y�ksek:',
		'sys_dmail.sendOptions' => 'Dahil edilen:',
		'sys_dmail.sendOptions.I.0' => 'HTML',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Parametreler, HTML:',
		'sys_dmail.plainParams' => 'Parametreler, Basit metin:',
		'sys_dmail.issent' => 'G�nderilmi�tir:',
		'sys_dmail.renderedsize' => 'Sunulan ebat:',
		'sys_dmail.attachment' => '�li�tirmeler:',
		'sys_dmail.type.I.0' => 'TYPO3 sayfas�',
		'sys_dmail.type.I.1' => 'D�� URL',
		'sys_dmail.plainParams.ALT.1' => 'Basit metin i�in URL:',
		'sys_dmail.HTMLParams.ALT.1' => 'HTML-i�eri�i i�in URL:',
		'sys_dmail_group' => 'Do�rudan mail grubu',
		'sys_dmail_group.type.I.0' => 'Sayfalardan',
		'sys_dmail_group.type.I.1' => 'Basit liste',
		'sys_dmail_group.type.I.2' => 'Statik grup',
		'sys_dmail_group.type.I.3' => '�zel soru',
		'sys_dmail_group.type.I.4' => 'Ba�ka mail gruplar�',
		'sys_dmail_group.static_list' => 'Al�c�lar:',
		'sys_dmail_group.mail_groups' => 'Ba�ka mail gruplar�:',
		'sys_dmail_group.whichtables' => 'Tablolar:',
		'sys_dmail_group.whichtables.I.0' => 'Kullan�c� taraf�ndan belirlenen tablo',
		'sys_dmail_group.whichtables.I.1' => 'Website kullan�c�s�',
		'sys_dmail_group.whichtables.I.2' => 'Kullan�c� tablosu tan�mland�',
		'sys_dmail_group.list' => 'Al�c�lar:',
		'sys_dmail_group.csv.I.0' => 'E-maillerin bo�luk/virg�l/sat�r bitimi taraf�ndan ayr�lmas�',
		'sys_dmail_group.csv.I.1' => 'CSV [ad�],[e-maili]',
		'sys_dmail_group.select_categories' => 'Haz�r bulunmas� gereken kategoriler:',
		'sys_dmail_group.select_categories.I.0' => 'Kategori 0',
		'sys_dmail_group.select_categories.I.1' => 'Kategori 1',
		'sys_dmail_group.select_categories.I.2' => 'Kategori 2',
		'sys_dmail_group.select_categories.I.3' => 'Kategori 3',
		'sys_dmail_group.select_categories.I.4' => 'Kategori 4',
		'sys_dmail_group.select_categories.I.5' => 'Kategori 5',
		'sys_dmail_group.select_categories.I.6' => 'Kategori 6',
		'sys_dmail_group.select_categories.I.7' => 'Kategori 7',
		'sys_dmail_group.select_categories.I.8' => 'Kategori 8',
		'sys_dmail_group.select_categories.I.9' => 'Kategori 9',
	),
	'se' => Array (
	),
	'pt' => Array (
		'sys_dmail' => 'Mala Directa',
		'sys_dmail.subject' => 'Assunto:',
		'sys_dmail.page' => 'P�gina de mail:',
		'sys_dmail.from_email' => 'Email remetente:',
		'sys_dmail.from_name' => 'Nome remetente:',
		'sys_dmail.replyto_email' => 'Email resposta:',
		'sys_dmail.replyto_name' => 'Nome resposta:',
		'sys_dmail.return_path' => '[Return Path]:',
		'sys_dmail.organisation' => 'Organiza��o:',
		'sys_dmail.priority' => 'Prioridade:',
		'sys_dmail.priority.I.0' => 'Baixa',
		'sys_dmail.priority.I.2' => 'Alta',
		'sys_dmail.sendOptions' => 'Inclu�r:',
		'sys_dmail.sendOptions.I.0' => 'Texto simples',
		'sys_dmail.sendOptions.I.1' => 'HTML',
		'sys_dmail.HTMLParams' => 'Par�metros, HTML:',
		'sys_dmail.plainParams' => 'Par�metros, Texto simples:',
		'sys_dmail.issent' => 'Foi enviado:',
		'sys_dmail.long_link_rdct_url' => 'RDCT url p/ links longos:',
		'sys_dmail.long_link_mode' => 'N�o somente links maiores de 76 caracteres mas TODOS os links:',
		'sys_dmail.renderedsize' => 'Tamanho compilado:',
		'sys_dmail.attachment' => 'Anexos:',
		'sys_dmail.type.I.0' => 'P�gina TYPO3',
		'sys_dmail.type.I.1' => 'URL externa',
		'sys_dmail.plainParams.ALT.1' => 'URL para Texto simples:',
		'sys_dmail.HTMLParams.ALT.1' => 'URL para conte�do HTML:',
		'sys_dmail_group' => 'Grupo de DirectMail',
		'sys_dmail_group.type.I.0' => 'Desde p�ginas',
		'sys_dmail_group.type.I.1' => 'Lista simples',
		'sys_dmail_group.type.I.2' => 'Grupo est�tico',
		'sys_dmail_group.type.I.3' => 'Pesquisa especial',
		'sys_dmail_group.type.I.4' => 'Outros Grupos Mail',
		'sys_dmail_group.static_list' => 'Destinat�rios:',
		'sys_dmail_group.mail_groups' => 'Outros mailgroups:',
		'sys_dmail_group.whichtables' => 'Tabelas:',
		'sys_dmail_group.whichtables.I.0' => 'Endere�o',
		'sys_dmail_group.whichtables.I.1' => 'Utilizador Website',
		'sys_dmail_group.whichtables.I.2' => 'Tabela definida pelo Utilizador',
		'sys_dmail_group.list' => 'Destinat�rios:',
		'sys_dmail_group.csv.I.0' => 'Separar emails com espa�o/v�rgula/quebra linha',
		'sys_dmail_group.csv.I.1' => 'CSV [nome],[email]',
		'sys_dmail_group.select_categories' => 'Deve atender categorias:',
		'sys_dmail_group.select_categories.I.0' => 'Cat 0',
		'sys_dmail_group.select_categories.I.1' => 'Cat 1',
		'sys_dmail_group.select_categories.I.2' => 'Cat 2',
		'sys_dmail_group.select_categories.I.3' => 'Cat 3',
		'sys_dmail_group.select_categories.I.4' => 'Cat 4',
		'sys_dmail_group.select_categories.I.5' => 'Cat 5',
		'sys_dmail_group.select_categories.I.6' => 'Cat 6',
		'sys_dmail_group.select_categories.I.7' => 'Cat 7',
		'sys_dmail_group.select_categories.I.8' => 'Cat 8',
		'sys_dmail_group.select_categories.I.9' => 'Cat 9',
	),
	'ru' => Array (
	),
	'ro' => Array (
	),
	'ch' => Array (
	),
	'sk' => Array (
	),
	'lt' => Array (
	),
);
?>