select manufacturer_name, count(products.id) 
from products 
inner join manufacturers on manufacturers.id = products.manufacturer_id
group by manufacturer_id;