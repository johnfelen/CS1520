function Problem( question, answers, correctAnswer )
{
    this.question = question;
    this.answers = answers;
    this.correctAnswerIndex = correctAnswer;

    this.getQuestion = getQuestion;
    this.getAnswers = getAnswers;
    this.getCorrectAnsIndex = getCorrectAnsIndex;

    function getQuestion()
    {
        return question;
    }

    function getAnswers()
    {
        return answers;
    }

    function getCorrectAnsIndex()
    {
        return correctAnswerIndex;
    }
}
