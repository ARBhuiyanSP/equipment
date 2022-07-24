create VIEW `qry_inv_receive` AS SELECT `inv_receive.mrr_no`, `inv_receive.mrr_date`, inv_receivedetail.material_id, inv_material.material_description, 
                      inv_receivedetail.receive_qty, inv_receivedetail.unit_price, inv_receivedetail.total_receive, inv_receive.supplier_id, 
                      inv_supplier.supplier_company, inv_receivedetail.sl_no, inv_receive.receive_type,  inv_materialcategory.category_id, 
                      inv_material.	qty_unit, inv_receive.purchase_id, inv_receive.receive_acct_id, inv_receive.remarks, inv_receive.receive_total, 
                      inv_receive. jv_no FROM `inv_materialcategory` INNER JOIN
                      inv_receivedetail INNER JOIN
                      `inv_material` ON `inv_receivedetail.material_id` = `inv_material.material_id` ON 
                      ` inv_materialcategory.material_sub_id` = `inv_material.material_sub_id` RIGHT OUTER JOIN
                      `inv_supplier` RIGHT OUTER JOIN
                      `inv_receive` ON `inv_supplier.supplier_id` = `inv_receive.supplier_id` ON `inv_receivedetail.mrr_no` = `inv_receive.mrr_no`;