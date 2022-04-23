<?php

class Dashboard extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
        error_log("Dashboard::constructor() ".$this->user->getRole());
    }

     function render(){
        error_log("Dashboard::RENDER() ");
        // $expensesModel          = new ExpensesModel();
        // $expenses               = $this->getExpenses(5);
        // $totalThisMonth         = $expensesModel->getTotalAmountThisMonth($this->user->getId());
        // $maxExpensesThisMonth   = $expensesModel->getMaxExpensesThisMonth($this->user->getId());
        // $categories             = $this->getCategories();

        $this->view->render('dashboard/index', [
            'user'                 => $this->user
        ]);
    }
    
    //obtiene la lista de expenses y $n tiene el número de expenses por transacción

    function getCategories(){
        $res = [];
        $categoriesModel = new CategoriesModel();
        $expensesModel = new ExpensesModel();

        $categories = $categoriesModel->getAll();

        foreach ($categories as $category) {
            $categoryArray = [];
            //obtenemos la suma de amount de expenses por categoria
            $total = $expensesModel->getTotalByCategoryThisMonth($category->getId(), $this->user->getId());
            // obtenemos el número de expenses por categoria por mes
            $numberOfExpenses = $expensesModel->getNumberOfExpensesByCategoryThisMonth($category->getId(), $this->user->getId());
            
            if($numberOfExpenses > 0){
                $categoryArray['total'] = $total;
                $categoryArray['count'] = $numberOfExpenses;
                $categoryArray['category'] = $category;
                array_push($res, $categoryArray);
            }
            
        }
        return $res;
    }
}

?>