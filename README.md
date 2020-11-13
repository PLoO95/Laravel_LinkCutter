
	Author: Hubert Pysz
	Start Date: 09.11.2020
	
	Simple link cutterm work with 26 char numeral system. Numeral system use a-z char to define number start in 0 to 25.
	
	Model:
		Link -> define link model, use parameter BigLink and SmallSink
	
	Controller:
		LinkController -> controll all action in site, witch work at Link(Model)
		
	View:
        link.create -> Site with form to LinkCut
        link.list -> Show links in database and action button, delete/open
        list.message -> Show message after action like delete/create
	
	Routing:
	    Get     '/'             -> return link.create view.
        Get     '/link'         -> return link.list view with parameters
        Get     '/link/{id}'    -> open site use shorUrl, or fail if do not exist in database
        Post    '/link'         -> create smallUrl in database or fail if form parameter is wrong
        Delete  '/link/{id}'    -> delete url form database where $id is same as smallUrl
        
   In future:
       1. Add config file, where define numeral system parameters
       2. Add admin controll panel
       3. Add max url life cycle
       4. Publish in my domain
		
	
