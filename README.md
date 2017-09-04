# laravel+weui实现微信书店
## 2017年7月新添
作为一个学习laravel框架而做的一个小项目，实现了一个仿造微信的webApp，前端还是比较简单，只是为了显示数据，如果有必要后期将会修改一下展示的样式，主要是为了熟悉laravel的用法。
## 基于weui实现的仿造微信的webApp
![TDD](https://github.com/Daemonth/GitImg/blob/master/bookshop/2017-09-04%2010-13-23%E5%B1%8F%E5%B9%95%E6%88%AA%E5%9B%BE.png)
## 以下为开发的历程：
* 2017年6月20开始框架的搭建
* 2017年6月21日数据库表的设计
* 2017年6月22日weui的引进，登陆注册的实现
* 2017年6月23日weui的首页的实现
* 2017年6月24日weui的子分类页面的实现
* 2017年6月26日weui的详情页的实现
* 2017年6月29日weui的离线购物车的实现
* 2017年7月5日weui的后台增删改查的实现

### 离线购物车的实现过程：
```
 // 如果当前已经登录
        $member = $request->session()->get('member', '');
        if($member != '') {
          $cart_items = CartItem::where('member_id', $member->id)->get();
    
          $exist = false;
          foreach ($cart_items as $cart_item) {
            if($cart_item->product_id == $product_id) {
              $cart_item->count ++;
              $cart_item->save();
              $exist = true;
              break;
            }
          }
    
          if($exist == false) {
            $cart_item = new CartItem;
            $cart_item->product_id = $product_id;
            $cart_item->count = 1;
            $cart_item->member_id = $member->id;
            $cart_item->save();
          }
    
          return $m3_result->toJson();
        }
    
        $bk_cart = $request->cookie('bk_cart');
        return $bk_cart;
       
        $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());
    
        $count = 1;
        foreach ($bk_cart_arr as &$value) {   // 一定要传引用
          $index = strpos($value, ':');
          if(substr($value, 0, $index) == $product_id) {
            $count = ((int) substr($value, $index+1)) + 1;
            $value = $product_id . ':' . $count;
            break;
          }
        }
    
        if($count == 1) {
          array_push($bk_cart_arr, $product_id . ':' . $count);
        }
    
        return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));
```        
ps:采用COOKIE的方式实现离线购物车

### 效果图：
![TDD](https://github.com/Daemonth/GitImg/blob/master/bookshop/2017-09-04%2010-18-51%E5%B1%8F%E5%B9%95%E6%88%AA%E5%9B%BE.png)
![TDD](https://github.com/Daemonth/GitImg/blob/master/bookshop/2017-09-04%2010-19-26%E5%B1%8F%E5%B9%95%E6%88%AA%E5%9B%BE.png)
![TDD](https://github.com/Daemonth/GitImg/blob/master/bookshop/2017-09-04%2010-19-54%E5%B1%8F%E5%B9%95%E6%88%AA%E5%9B%BE.png)
![TDD](https://github.com/Daemonth/GitImg/blob/master/bookshop/2017-09-04%2010-25-34%E5%B1%8F%E5%B9%95%E6%88%AA%E5%9B%BE.png)
