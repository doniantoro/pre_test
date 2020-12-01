# Slim Framework 3 Skeleton ApplicationT

This is using slim framework version 3  and sleketon

i can provide sql database also which can you import on your sql with name query.sql

to run this apps able to use docker and docker , for composer u can start with 

    	Composer start

,or we can use docker with

	docker-compose up -d


The api end-point :

	/getUser/{id}/ : get 1 user data.  >> Methode : get
	/getListUser : get >1 user data.   >> Methode : get
	/getCompany/{id}/ : get 1 company.  >> Methode : get
	/getListCompany : get >1 company.  >> Methode : get
	/getBudgetCompany/{id}/: get 1 company.   >> Methode : get
	/getListBudgetCompany : get >1 company.  >> Methode : get
	/getLogTransaction : get the log that provide name of the user, account number, company name, transaction type, transaction date, amount, and remaining 	amount.  >> Methode : get
	/createCompany : create 1 company. required name,address   >> Methode : post
	/updateCompany/{id}/: update 1 company data. >> Methode : put
	/deleteCompany/{id}/: delete 1 company data. >> Methode : delete
	
	/deleteUser/{id}/ : delete 1 company data. >> Methode : delete
	/createUser : create 1 user.> required first_name,lastname,email,account,company_id,bank,no_rek >> Methode : post
	/updateUser/{id}/ : update 1 user data.> required id >> Methode : put
	/createTransaction/ : Create transaction,and will update if transaction succes ,required:type,amount,user_id 
	
	
	
*Note : -every every link which used /{id}/ , have to fill number like 1,2,3
	-Every end point required use key, the key which i made g6swmAP8X5VG4jCi

