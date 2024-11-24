# Business Transaction Reporting for New Zealand Police

This package will help you generate an XML file for New Zealand Police reports.

## Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require saeid-khaleghi/police-reporter
```

## Usage

```php
use SaeidKhaleghi\PoliceReporter\XMLGenerator;

$transactions = Transaction::all();

$reporter = XMLGenerator::create($transactions)->writeToFile($path);
```

You can add your models directly by implementing the `\SaeidKhaleghi\PoliceReporter\Contracts\Reportable` interface.

```php
use SaeidKhaleghi\PoliceReporter\Contracts\Reportable;

class Transaction extends Model implements Reportable
{
    public function toReportTransaction(): Url | string | array
    {
        return (new ReportTransaction($this))->transaction();
    }
}
```

Your PoliceReportTransactionMaker should be like this:
```php
use SaeidKhaleghi\PoliceReporter\Tags\Person;
use SaeidKhaleghi\PoliceReporter\Tags\Signatory;
use SaeidKhaleghi\PoliceReporter\Tags\ToAccount;
use SaeidKhaleghi\PoliceReporter\Tags\FromAccount;
use SaeidKhaleghi\PoliceReporter\Tags\TransactionTo;
use SaeidKhaleghi\PoliceReporter\Tags\TransactionFrom;
use SaeidKhaleghi\PoliceReporter\Tags\Transaction as ReportTransaction;

class PoliceReportTransactionMaker
{
    private Transaction $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function transactionFrom()
    {
        return new TransactionFrom('From fund code', 'From country');
    }

    public function fromAccount()
    {
        return new FromAccount(env('APP_FORMAL_NAME'), env('APP_INSTITUTION_CODE'), 'Branch', 'Account', 'Account_name');
    }

    public function accountRelatedPerson()
    {
        $identification = new PersonIdentification('Type', 'id_number', 'country', 'Expiry date');
        $user = new Person('Gender', 'First name', 'Last name', 'Birthdate', 'Id Type',  'Id number', 'Issue Country (Two-Letter Country Code)', $identification);

        return new AccountRelatedPerson($user);
    }

    public function transactionTo()
    {
        return new TransactionTo('To fund code', 'Destination Currency', 'Destination amount', 'To country');
    }

    public function toAccount()
    {
        return ToAccount::create('Institution name', 'Account', 'Account_name', 'swift');
    }

    public function transaction()
    {
        return ReportTransaction::create($this->transfer->reference, $this->transfer->updated_at, $this->transfer->origin_amount)
            ->addFromMyClient($this->transactionFrom()->addFromAccount($this->fromAccount()->addAccountRelatedPerson($this->accountRelatedPerson())))
            ->addTransactionTo($this->transactionTo()->addToAccount($this->toAccount()));
    }
}
```
The generated XML will look similar to this:

```xml
<reportdata>
    <transactions>
        <transaction>
            <transactionnumber>TW01182606-101023</transactionnumber>
            <transaction_location>web</transaction_location>
            <date_transaction>2023-10-11T11:03:51</date_transaction>
            <transmode_code>BA</transmode_code>
            <amount_local>129.06</amount_local>
            <t_from_my_client>
                <from_funds_code>N</from_funds_code>
                <from_account>
                    <institution_name>Your Company</institution_name>
                    <institution_code>12345</institution_code>
                    <branch>web</branch>
                    <account>ABC123</account>
                    <account_name>Saeid Khaleghi</account_name>
                    <related_persons>
                        <account_related_person>
                            <t_person>
                                <gender>M</gender>
                                <first_name>Saeid</first_name>
                                <last_name>Khaleghi</last_name>
                                <birthdate>1980-06-24T00:00:00</birthdate>
                                <id_number>ZYXWV123</id_number>
                                <identifications>
                                    <identification>
                                        <type>A</type>
                                        <number>ZYXWV123</number>
                                        <issue_country>NZ</issue_country>
                                    </identification>
                                </identifications>
                            </t_person>
                        </account_related_person>
                    </related_persons>
                </from_account>
                <from_country>NZ</from_country>
            </t_from_my_client>
            <t_to>
                <to_funds_code>N</to_funds_code>
                <to_account>
                    <institution_name>BNZ</institution_name>
                    <swift>BSIRIRTH</swift>
                    <account>ABCDEFGHIJK1234567890</account>
                    <account_name>RECIPIENT NAME</account_name>
                </to_account>
                <to_country>US</to_country>
            </t_to>
        </transaction>
        <transaction>
            ...
        </transaction>
    </transactions>
</reportdata>
```

## Credits

- [Saeid Khaleghi](https://github.com/saeid-khaleghi)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
