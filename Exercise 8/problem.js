function Problem( question, answers, correctAnswer )
{
    this.question = question;
    this.answers = answers;
    this.correctAnswer = correctAnswer;

    this.getQuestion = getQuestion;
    this.getAnswers = getAnswers;
    this.getCorrectAnswer = getCorrectAnswer;

    function getQuestion()
    {
        return question;
    }

    function getAnswers()
    {
        return answers;
    }

    function getCorrectAnswer()
    {
        return correctAnswer;
    }
}
