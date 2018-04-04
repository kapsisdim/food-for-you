<?php 
    if(isset($_POST['submit'])){
        //search for the pending order
        $sth = $dbh->prepare('SELECT username FROM orders WHERE status="pending"');
        $sth-> execute();
        $result = $sth->fetchALL();
        
        $summ=0;
        $username = $_SESSION['username'];
        
        //if there is no pending order for this user create a new order
        if(empty($result)){
            if(isset($_POST['checklist'])){
                foreach($_POST['checklist'] as $check){
                                        
                    $sth = $dbh->prepare('SELECT price FROM menu WHERE name=?');
                    $sth->execute(array($check));
                    $result = $sth->fetchAll();
                    
                    foreach($result as $r){
                        $summ += floatval($r['price']); 
                    }                                  
                }            
            }
            //store the new order to table orders
            $sth = $dbh->prepare('INSERT INTO orders (username, summa, status) VALUES (?,?,?)');
            $sth->execute(array($username, $summ, 'pending'));
        
        //else add the new products to the last order
        }else {
            $sth = $dbh->prepare('SELECT summa FROM orders WHERE username=?, status="pending"');
            $sth->execute(array($username));
            $result = $sth->fetchAll();
            
            foreach($result as $r){
                $summ += floatval($r['summa']); 
            }  
            
            if(isset($_POST['checklist'])){
                foreach($_POST['checklist'] as $check){                                         
                    
                    $sth = $dbh->prepare('SELECT price FROM menu WHERE name=?');
                    $sth->execute(array($check));
                    $result = $sth->fetchAll();
                    
                    foreach($result as $r){
                        $summ += floatval($r['price']);
                        
                    }
                }                
            }
            //update the order
            $sth = $dbh->prepare('UPDATE orders (summa) VALUES (?)');
            $sth->execute(array($summ));
        }
    }    
        
        
        
        
    

