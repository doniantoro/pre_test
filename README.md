# Slim Framework 3 Skeleton ApplicationT

This is using slim framework version 3  and sleketon

to run this apps able to use docker and docker , for composer u can start with 

    	Composer start
	
	docker-compose up -d


The api end-point :

	/getUser/{id}/ : get 1 user data.
	/getListUser : get >1 user data. 
	/getCompany/{id}/ : get 1 company.
	/getListCompany : get >1 company.
	/getBudgetCompany/{id}/: get 1 company. 
	/getListBudgetCompany : get >1 company.
	/getLogTransaction : get the log that provide name of the user, account number, company name, transaction type, transaction date, amount, and remaining 	amount.
	/createCompany : create 1 company. required name,address
	/updateCompany/{id}/: update 1 company data.
	/deleteCompany/{id}/: delete 1 company data.
	
	/deleteUser/{id}/ : delete 1 company data. 
	/createUser : create 1 user.> required first_name,lastname,email,account,company_id,bank,no_rek
	/updateUser/{id}/ : update 1 user data.> required id
	
*Note : -every every link which used /{id}/ , have to fill number like 1,2,3
	-Every end point required use key, the key which i made g6swmAP8X5VG4jCi

