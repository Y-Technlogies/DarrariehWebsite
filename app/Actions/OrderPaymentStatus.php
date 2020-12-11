<?php
/**
 * Created by PhpStorm.
 * User: BDO
 * Date: 8/29/2020
 * Time: 6:16 PM
 */

namespace App\Actions;


use TCG\Voyager\Actions\AbstractAction;

class OrderPaymentStatus extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return ($this->data->status == 'requested') ? 'Paid' : 'Unpaid';
    }

    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        return ($this->data->status != 'Paid') ? 'voyager-dollar' : '';
    }

    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-primary pull-right btn-detail',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return ($this->dataType->slug == 'orders');
    }

    public function getDefaultRoute()
    {
        // URL for action button when click
        return route('order.status.update', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}