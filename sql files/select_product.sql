delimiter ;;

drop procedure if exists select_product;;

create procedure select_product()

begin

SELECT * FROM product; 

end
;;