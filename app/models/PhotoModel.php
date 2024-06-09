<?php
class PhotoModel extends Model
{
    public function getAllPhotos()
    {
        $sql = parent::$connection->prepare('SELECT * from photos');
        return parent::select($sql);
    }
    public function like($id)
    {
        $sql = parent::$connection->prepare('UPDATE `photos` SET `likes`=`likes`+1 WHERE `id`=?');
        $sql->bind_param('i', $id);
        $sql->execute();

        $sql = parent::$connection->prepare('SELECT `likes` from photos WHERE `id`=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    public function view($id)
    {
        $sql = parent::$connection->prepare('UPDATE `photos` SET `views`=`views`+1 WHERE `id`=?');
        $sql->bind_param('i', $id);
        $sql->execute();

        $sql = parent::$connection->prepare('SELECT `views` from photos WHERE `id`=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    
    public function pin($id)
    {
        $sql = parent::$connection->prepare('UPDATE `photos` SET `pins`=`pins`+1 WHERE `id`=?');
        $sql->bind_param('i', $id);
        $sql->execute();

        $sql = parent::$connection->prepare('SELECT `pins` from photos WHERE `id`=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    
}
