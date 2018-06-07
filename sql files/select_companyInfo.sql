delimiter ;;

drop procedure if exists select_companyInfo;;

create procedure select_companyInfo()

begin

SELECT * FROM companyInfo; 

end
;;