<?php

namespace App\View\Components\Util\headBarAction;

use Illuminate\View\Component;
use App\ViewModel\Notification\NotificationUtil;

class NotifItem extends Component
{
    public $type,
           $titre,
           $icon,
           $image,
           $link_name,
           $link_url,
           $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$titre,$message,$link="",$image="")
    {
        $this->type =$type;
        $this->titre =$titre;
        $this->image = $image;
        $this->message = $message;
        if(!empty($link)){
            $tab = explode(";",$link);
            $this->link_name= $tab[0];
            $this->link_url = $tab[1];
        }
        $this->icon = NotificationUtil::getIcon($type);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.util.head-bar-action.notif-item');
    }
}
