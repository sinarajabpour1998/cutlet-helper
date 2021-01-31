<?php

namespace Va\CutletHelper\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Va\CutletHelper\Facades\CategoryHelperFacade;

class CategoryOptions extends Component
{
    /**
     * The type of menu, modules or manager
     * @var
     */
    public $page;

    public $parent_id;

    public $type;

    public $category_id;

    public function __construct($page,$type,$category = '',$parent = '')
    {
        // Set input variables to generate a component
        $this->page = $page;
        $this->parent_id = $parent;
        $this->type = $type;
        $this->category_id = $category;
    }

    public function render()
    {
        switch ($this->page){
            case 'create':
                return CategoryHelperFacade::category_select_options($this->categories(), old('parent_id'));
            case 'edit':
                return CategoryHelperFacade::category_select_options($this->categories(), old('parent_id', $this->parent_id), $this->category_id);
        }
    }

    public function categories()
    {
        return Category::query()->where('parent_id', 0)
            ->where('category_type', $this->type)
            ->get();
    }
}
