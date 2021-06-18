<?php


class DB
{
    public static function getRecord(PDO $pdo, array $data)
    {
        $q = $pdo->prepare("select * from logs where ip_address = :ip and user_agent = :agent and page_url = :referer");
        $q->execute([':ip' => $data['ip'], ':agent' => $data['agent'],':referer' => $data['referer']]);
        return $q->fetch(PDO::FETCH_BOTH);
    }

    public static function addRecord(PDO $pdo, array $data)
    {
        $q = $pdo->prepare("insert into logs (ip_address, user_agent, page_url, view_date) values (:ip,:agent,:referer,:date)");
        $q->execute([':ip' => $data['ip'], ':agent' => $data['agent'],':referer' => $data['referer'], ':date' => date('Y-m-d H:i:s')]);
    }

    public static function updateRecord(PDO $pdo, array $data)
    {
        $q = $pdo->prepare("update logs set view_date = :date, views_count = :count  where id = :id");
        $q->execute([':date' => date('Y-m-d H:i:s'), ':count' => ++$data['views_count'], ':id' => $data['id']]);
    }
}