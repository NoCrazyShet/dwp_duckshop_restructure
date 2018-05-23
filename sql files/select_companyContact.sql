delimiter ;;

drop procedure if exists select_companyContact;;

create procedure select_companyContact()

begin

SELECT * FROM companyContact; 

end
;;