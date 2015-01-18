<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/19/14
 * Time: 9:12 PM
 */

class CommonService {
    public static function itemPerPage($max) {
        $html = "<select class='item-per-page form-control'>".PHP_EOL;
        $array = array(
            '10' => '10',
            '20' => '20',
            '25' => '25',
            '50' => '50',
            '100' => '100',
            '200' => '200'
        );
        foreach($array as $key => $value) {
            $class = intval($value) == $max ? "selected" : "";
            $html = $html."<option value='$key' $class>$value</option>".PHP_EOL;
        }
        $html = $html."</select>";
        return $html;
    }
    public static function paginator($max, $offset, $total) {
        $html = "<ul class='pagination' max='$max' offset='$offset' total='$total'>".PHP_EOL;
        $currentPage = intval($offset / $max) + 1;
        $noOfPage = ceil($total/$max);
        $class = $currentPage == 1 ? "disabled" : "";
        $html =  $html."<li page='prev' class='$class'><a>&laquo;</a></li>".PHP_EOL;
        for($i = 1; $i <= $noOfPage; $i++) {
            $class = $i == $currentPage ? "active" : "";
            $html =  $html."<li page='$i' class='$class' ><a>$i</a></li>".PHP_EOL;
        }
        $class = $currentPage == $noOfPage || $total < $max ?  "disabled" : "";
        $html = $html."<li page='next' class='$class'><a>&raquo;</a></li>".PHP_EOL;
        $html = $html.'</ul>';
        return $html;
    }

    public static function renderCategoryNav() {
        $categories = Category::all();
        $currentAction = Route::currentRouteAction();
        $currentCategory = null;
        if($currentAction == "CategoryController@getDetails") {
            $currentCategory = intval(Route::input("one"));
            $selectedCategory = Category::find($currentCategory);
            $currentCategory = $selectedCategory && $selectedCategory->category_id ? $selectedCategory->category_id : $currentCategory; 
        }

        $html = '<li '.($currentAction != "HomeController@index" ? "" : 'class="active"').'><a href="'.SR::$baseUrl.'">Home</a></li>';
        $categoryMapping = array();
        foreach($categories as $category) {
            $parent = $category->category_id;
            if($parent) {
                if(!array_key_exists($parent, $categoryMapping)) {
                    $categoryMapping[$parent] = array('child' => array());
                }
                array_push($categoryMapping[$parent]['child'], array('id' => $category->id, 'name' => $category->name)); 
            } else {
                if(!array_key_exists($category->id, $categoryMapping)) {
                    $categoryMapping[$category->id] = array('child' => array());
                }
                $categoryMapping[$category->id]['name'] = $category->name;
                $categoryMapping[$category->id]['id'] = $category->id;
            }
        }
        foreach($categoryMapping as $key => $category) {
            $nav = "";
            $childes = $category['child'];
            if(count($childes)) {
                $nav = '<li role="presentation" class="'.($currentCategory == $category['id'] ? 'active ' : '').'dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">';
                $nav = $nav.$category['name'].'<span class="caret"></span></a><ul class="dropdown-menu" role="menu">';
                foreach($childes as $child) {
                    $nav = $nav."<li><a href='" . SR::$baseUrl ."category/details/{$child['id']}'>{$child['name']}</a></li>";
                }
                $nav = $nav.'</ul></li>';

            } else {
                $nav = "<li ".($currentCategory == $category['id'] ? 'class="active"' : '')."><a href='" . SR::$baseUrl ."category/details/{$category['id']}'>{$category['name']}</a></li>";
            }
            $html = $html.$nav;
        }
        return $html;
    }
    
    static function categorySelect() {
        $categories = Category::all();
        $categoryMapping = array();
        foreach($categories as $category) {
            $parent = $category->category_id;
            if($parent) {
                if(!array_key_exists($parent, $categoryMapping)) {
                    $categoryMapping[$parent] = array('child' => array());
                }
                array_push($categoryMapping[$parent]['child'], array('id' => $category->id, 'name' => $category->name));
            } else {
                if(!array_key_exists($category->id, $categoryMapping)) {
                    $categoryMapping[$category->id] = array('child' => array());
                }
                $categoryMapping[$category->id]['name'] = $category->name;
                $categoryMapping[$category->id]['id'] = $category->id;
            }
        }
        echo '<select class="form-control"> name="category"';
        foreach($categoryMapping as $key => $category) {
            $childes = $category['child'];
            if(count($childes)) {
                echo "<optgroup label='{$category['name']}'>";
                foreach($childes as $child) {
                    echo "<option value='{$child['id']}'>{$child['name']}</option>";
                    
                }
                echo "</optgroup>";
            } else {
                echo "<option value='{$category['id']}'>{$category['name']}</option>";
            }
        }
        echo '</select>';
    }


} 